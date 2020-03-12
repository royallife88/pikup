@include('elite.admin.header')

<body>
    <!-- Tables -->
    <h1>Users Message</h1>
    <table class="table table-striped">

        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Replied</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        @php $count = 0; @endphp @foreach($replied_messages as $value)

        <div class="modal fade" id="exampleModal{{$count}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="post" id="form">
                    {{csrf_field()}}
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Recipient Email:</label>
                                    <input type="email" name="email" value="{{$value->email}}" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea rows="6" name="reply" class="form-control" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="send_message" value="send_message" class="btn btn-primary">Send message</button>
                        </div>
                    </div>
            </div>
        </div>
        </form>
        <tbody>
            <tr>
                <th scope="row">{{$value->name}}</th>
                <td>{{$value->email}}</td>
                <td>{{$value->subject}}</td>
                <td>{{$value->message}}</td>
                <td>{{$value->replied}}</td>
                <td><a style='text-decoration: none;' href="{{url('delete_message')}}" onClick="return confirm('Do You Want To Delete This?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
        </tbody>
        @php $count++; @endphp @endforeach
    </table>

</body>

</html>
@include('elite.admin.footer')