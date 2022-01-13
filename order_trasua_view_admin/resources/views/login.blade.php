<!DOCTYPE html>
<html>

<style>
    /* .headFont {
        font-weight: bold;
        text-align: center;
        font-size: 30px;
        color: #fff;
        height: 40px;
        margin-bottom: 30px;
        display: block;
        background-color: darkslategrey !important;

    } */
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        font-family: 'Jost', sans-serif;
        background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
    }

    .main {
        width: 350px;
        height: 500px;
        background: red;
        overflow: hidden;
        background: url("https://doc-08-2c-docs.googleusercontent.com/docs/securesc/68c90smiglihng9534mvqmq1946dmis5/fo0picsp1nhiucmc0l25s29respgpr4j/1631524275000/03522360960922298374/03522360960922298374/1Sx0jhdpEpnNIydS4rnN4kHSJtU1EyWka?e=view&authuser=0&nonce=gcrocepgbb17m&user=03522360960922298374&hash=tfhgbs86ka6divo3llbvp93mg4csvb38") no-repeat center/ cover;
        border-radius: 10px;
        box-shadow: 5px 20px 50px #000;
    }

    #chk {
        display: none;
    }

    .login {
        position: relative;
        width: 100%;
        height: 100%;
    }

    label {
        color: #fff;
        font-size: 2.3em;
        justify-content: center;
        display: flex;
        margin: 60px;
        font-weight: bold;
        cursor: pointer;
        transition: .5s ease-in-out;
    }

    input {
        width: 60%;
        height: 20px;
        background: #e0dede;
        justify-content: center;
        display: flex;
        margin: 20px auto;
        padding: 10px;
        border: none;
        outline: none;
        border-radius: 5px;
    }

    button {
        width: 60%;
        height: 40px;
        margin: 10px auto;
        justify-content: center;
        display: block;
        color: #fff;
        background: #573b8a;
        font-size: 1em;
        font-weight: bold;
        margin-top: 20px;
        outline: none;
        border: none;
        border-radius: 5px;
        transition: .2s ease-in;
        cursor: pointer;
    }

    button:hover {
        background: #6d44b8;
    }

    /* .login {
        height: 460px;
        background: #eee;
        border-radius: 60% / 10%;
        transform: translateY(-180px);
        transition: .8s ease-in-out;
    } */

    /* .login label {
        color: #573b8a;
        transform: scale(.6);
    } */

    #chk:checked~.login {
        transform: translateY(-500px);
    }

    /* #chk:checked~.login label {
        transform: scale(1);
    } */

    #chk:checked~.login label {
        transform: scale(.6);
    }

    .text--center {
        text-align: center;
    }

    p {
        margin-block: 1.5rem;
    }
</style>
<!-- Page Content -->



<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">

    <div class="login">
        <form action="{{route('login')}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label for="chk" aria-hidden="true">Login</label>
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="password" placeholder="Password" required="">
            @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            <!--  -->
            @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}}<br>
                @endforeach
            </div>
            @endif
            <button>Login</button>
            <!-- <p class="text--center"> <a href="getSignUp">Quên mật khẩu</a></p> -->
            <p class="text--center">Not a member? <a href="getSignUp">Sign up now</a></p>
        </form>

    </div>
</div>

</html>