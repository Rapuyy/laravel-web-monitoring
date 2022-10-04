@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('css')
<style>
.card-img-top {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>
@endsection

@section('content')
<div class="container" >
    <div class="row">
        <div class="col"></div>
        <div class="col-sm-11">
            <div class="card h-11100 text-center" style="">
                <div class="card-header">
                  Pemakaian Masker
                </div>
                <div>
                    <canvas id="frame" height="400" width="711" style="display:inline-block" />
                </div>
                <div class="card-footer" style="text-align: left">
                    Correct <p id="res1"></p>
                    Incorrect <p id="res2"></p>
                    No Face Mask <p id="res3"></p>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    openSocket = () => {
        var ip = prompt("Masukkan IP Address Jetson Nano :")
        socket = new WebSocket("ws://" + ip + ":9997/")

        let frame = document.getElementById("frame")
        let res1 = document.getElementById("res1")
        let res2 = document.getElementById("res2")
        let res3 = document.getElementById("res3")

        socket.addEventListener('open', (e) => {
            alert("[open] Connection established")
        });
        socket.addEventListener('message', (e) => {
            if (typeof e.data == 'string') {
                const split = e.data.split("/");
                res1.innerHTML = split[0]
                res2.innerHTML = split[1]
                res3.innerHTML = split[2]
            }
            else{
                let ctx = frame.getContext("2d")
                let image = new Image()
                image.src = URL.createObjectURL(e.data)
                image.addEventListener("load", (e) => {
                    ctx.drawImage(image, 0, 0, frame.width, frame.height)
                });
            }
        });
        socket.onclose = function(event) {
            if (event.wasClean) {
                alert(`[close] Connection closed cleanly, code=${event.code} reason=${event.reason}`)
            } else {
                alert('[close] Connection died')
            }
        };
        socket.onerror = function(error) {
            alert(`[error] ${error.message}`)
        };
    }
</script>
@endsection