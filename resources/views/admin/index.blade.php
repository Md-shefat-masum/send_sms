@extends('layouts.admin.admin')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="#" id="sms_form" name="sms_form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Mobile NO:</label>
                            <input type="text" name="number" value="+880" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="">Type Message:</label>
                            <textarea name="text" class="form-control" style="height: 300px"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-info send_message">SEND</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Dashboard Content-->

    @push('js')
        <script>

            $('.send_message').on('click',function(e){
                e.preventDefault();
                let message = sms_form.text.value;
                let phone = sms_form.number.value;
                phone = phone.replace('-','');
                phone = phone.replace(' ','');
                phone = phone.slice(3, phone.length)
                phone = parseInt(phone);

                if(message.length > 0){
                    let url = `https://sms.youthfireit.com/api/send?key=5de7f7c6325f89dbabbb6d2da0c91db0e6b17e34&phone=${phone}&message=${message}&"device"=1&sim=1&priority=1`;
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'application/json',
                        success:function(response){
                            console.log(response);
                            sms_form.text.value = '';
                            sms_form.number.value = '+880';
                        },
                        error:function(error){
                            console.log(error);
                            sms_form.text.value = '';
                            sms_form.number.value = '+880';
                        }

                    })
                }else{
                    alert('write something.');
                }
                console.log(phone,message);
            });

        </script>
    @endpush
@endsection
