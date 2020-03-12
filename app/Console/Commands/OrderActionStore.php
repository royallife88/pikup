<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Illuminate\Support\Carbon;
use App\Notification;

class OrderActionStore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:OrderActionStore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reject Order after 3 minutes if store did not take action';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // change the order action to reject if store owner not responed after 3 minutes
        DB::table('laravelproject_new_goods_order_items')->where('accept_or_reject', 2)->where('created_at', '<' , Carbon::now('Asia/Karachi')->subMinutes(3)->toDateTimeString())->update(['accept_or_reject' => 0]);
        // get all the order where order action to accpeted by stoer owner
        $get_order_id = DB::table('laravelproject_new_goods_orders')
            ->join('laravelproject_new_goods_order_items', 'laravelproject_new_goods_orders.id', 'laravelproject_new_goods_order_items.order_id')
            ->where('laravelproject_new_goods_orders.driver_notification', 0) // condition where notification is not send to drivers
            ->where('laravelproject_new_goods_order_items.accept_or_reject', 1)
            ->select('laravelproject_new_goods_orders.id')
            ->groupBy('laravelproject_new_goods_orders.id')
            ->get();
        $arr = array();

        if(count($get_order_id) > 0){
            foreach($get_order_id as $order_id){ // looping through the order ids get above
                $pending_orders = DB::table('laravelproject_new_goods_order_items')->where('order_id', $order_id->id)->where('accept_or_reject', 2)->get();
                // if all store reponsed are done for this order id
                if(count($pending_orders) == 0){
                    array_push($arr, $order_id);
                    // sending the notification to driver if order is ready for delivery
                    $this->send_order_notifications_to_driver($order_id->id);
                    DB::table('laravelproject_new_goods_orders')->where('driver_notification', 0)->where('id', $order_id->id)->update(['driver_notification' => 1]);
                }
                sleep(5); // it is necessary to send multiple order notification using above loop
            }

        }
        return true;

    }

    public function send_order_notifications_to_driver($order_id)
    { 
        // fetching the long lat of the stores if store accepted the order and ready to deliver
        $store_lat_long = DB::table('laravelproject_new_goods_orders')
            ->join('laravelproject_new_goods_order_items', 'laravelproject_new_goods_orders.id', 'laravelproject_new_goods_order_items.order_id')
            ->join('laravelproject_new_store_register', 'laravelproject_new_goods_order_items.store_id', 'laravelproject_new_store_register.store_id')
            ->where('laravelproject_new_goods_orders.id', $order_id)
            ->where('laravelproject_new_goods_order_items.accept_or_reject', '1')
            ->limit(1)
            ->select('laravelproject_new_store_register.latitude', 'laravelproject_new_store_register.longitude')
            ->first();

        if(!empty($store_lat_long)){
            $latitude = $store_lat_long->latitude;
            $longitude = $store_lat_long->longitude;
        }else{
            die();
        }


        $order_rejected_by_drivers = DB::table('laravelproject_new_goods_orders')->select('order_rejected_by_drivers')->where('id', $order_id)->first();
        if (empty($order_rejected_by_drivers->order_rejected_by_drivers)) { // if order is not rejected by any driver
            $id = DB::table('laravelproject_new_drivers')->where('booked', '=', '0')->get();
            $results = DB::table('laravelproject_new_drivers')
                // query tp get the driver who is nearest to the store
                ->selectRaw("id, firebase_token,( 3959 * acos( cos( radians('.$latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( latitude ) ) ) ) AS distance")
                ->where('booked', '!=', '1') // condition for driver who is not booked
                ->orderBy('distance')
                ->limit(1)
                ->get();
        } else { // if order is rejected by some drivers
            //fetching drivers ids who rejected the order 
            $id = DB::table('laravelproject_new_goods_orders')->select('order_rejected_by_drivers')->where('id', $order_id)->first()->order_rejected_by_drivers;
            $id =  unserialize($id); // unserialize the above drivers ids to array
            $results = DB::table('laravelproject_new_drivers')
                // query tp get the driver who is nearest to the store
                ->selectRaw("id, firebase_token,( 3959 * acos( cos( radians('.$latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') ) * sin( radians( latitude ) ) ) ) AS distance")
                ->where('booked', '!=', '1') // condition for driver who is not booked
                ->whereNotIn('id', $id) // condition for not get those driver who rejected the order before
                ->orderBy('distance', 'asc')
                ->limit(1)
                ->get();
        }

           
        
        //sending notification to driver who does not rejected the order before
        foreach ($results as $value) {
            $status = "arrive";
            $order_id = $order_id;
            $firebase_token = $value->firebase_token;
            $notification = new Notification(); // creating new notification
            $message = 'You have a new order #' . $order_id . ' kindly deliver.';
            $status = 'New Order Arrived';
            $imageUrl = isset($_POST['image_url']) ? $_POST['image_url'] : '';
            $action = isset($_POST['action']) ? $_POST['action'] : '';

            $actionDestination = isset($_POST['action_destination']) ? $_POST['action_destination'] : '';

            if ($actionDestination == '') {
                $action = '';
            }
            // setting the parameter value to create new notification
            $notification->setTitle($status);
            $notification->setMessage($message);
            $notification->setImage($imageUrl);
            $notification->setAction($action);
            $notification->setActionDestination($actionDestination);

            // firebase api
            $firebase_api = 'AAAAQ4wDfdQ:APA91bGWMY3F2gSnGYutYhD6E6mDntRteb9YMCHhi4PRe0cOWcZf5Tsrnkulm6UatY98FXJhpGMq614EFAsbIIcjKSC0ea3LM29_3_bt0o5ee_Wp-J6QbEtk5T1LX4kKAWvpblhuLCJn';

            $topic = 'asdsad';

            $requestData = $notification->getNotificatin();

            if ('sadsad' == 'topic') {
                $fields = array(
                    'to' => '/topics/' . $topic,
                    'data' => $requestData,
                );
            } else {

                $fields = array(
                    'to' => $firebase_token,
                    'data' => $requestData,
                );
            }


            // url of firebase message api to send notification request
            $url = 'https://fcm.googleapis.com/fcm/send';
            // setting the firebase api in header
            $headers = array(
                'Authorization: key=' . $firebase_api,
                'Content-Type: application/json'
            );

            // Open curl connection
            $ch = curl_init();

            // Set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);

            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Disabling SSL Certificate support temporarily
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            // Execute post
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }
            return response()->json(['message' => 'Notification Send Successfully!', 'code' => '200']);
            // Close connection
        }
    }
}
