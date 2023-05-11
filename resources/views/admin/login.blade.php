<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập Quản trị</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{url('admin_assets')}}/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{url('admin_assets')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="{{url('admin_assets')}}/dist/css/adminlte.min.css?v=3.2.0">
    <link rel="icon" href="{{url('assets')}}/images/logo.png" type="image/gif" sizes="16x16">


    <script nonce="8849584f-3cb9-47c5-bd58-a09f583e12ac">
    (function(w, d) {
        ! function(f, g, h, i) {
            f[h] = f[h] || {};
            f[h].executed = [];
            f.zaraz = {
                deferred: [],
                listeners: []
            };
            f.zaraz.q = [];
            f.zaraz._f = function(j) {
                return function() {
                    var k = Array.prototype.slice.call(arguments);
                    f.zaraz.q.push({
                        m: j,
                        a: k
                    })
                }
            };
            for (const l of ["track", "set", "debug"]) f.zaraz[l] = f.zaraz._f(l);
            f.zaraz.init = () => {
                var m = g.getElementsByTagName(i)[0],
                    n = g.createElement(i),
                    o = g.getElementsByTagName("title")[0];
                o && (f[h].t = g.getElementsByTagName("title")[0].text);
                f[h].x = Math.random();
                f[h].w = f.screen.width;
                f[h].h = f.screen.height;
                f[h].j = f.innerHeight;
                f[h].e = f.innerWidth;
                f[h].l = f.location.href;
                f[h].r = g.referrer;
                f[h].k = f.screen.colorDepth;
                f[h].n = g.characterSet;
                f[h].o = (new Date).getTimezoneOffset();
                if (f.dataLayer)
                    for (const s of Object.entries(Object.entries(dataLayer).reduce(((t, u) => ({
                            ...t[1],
                            ...u[1]
                        }))))) zaraz.set(s[0], s[1], {
                        scope: "page"
                    });
                f[h].q = [];
                for (; f.zaraz.q.length;) {
                    const v = f.zaraz.q.shift();
                    f[h].q.push(v)
                }
                n.defer = !0;
                for (const w of [localStorage, sessionStorage]) Object.keys(w || {}).filter((y => y.startsWith(
                    "_zaraz_"))).forEach((x => {
                    try {
                        f[h]["z_" + x.slice(7)] = JSON.parse(w.getItem(x))
                    } catch {
                        f[h]["z_" + x.slice(7)] = w.getItem(x)
                    }
                }));
                n.referrerPolicy = "origin";
                n.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(f[h])));
                m.parentNode.insertBefore(n, m)
            };
            ["complete", "interactive"].includes(g.readyState) ? zaraz.init() : f.addEventListener(
                "DOMContentLoaded", zaraz.init)
        }(w, d, "zarazData", "script");
    })(window, document);
    </script>
    <style>
        .background {

        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="background">

        <div class="login-box">

            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="" class="h1"><b>Đăng nhập</b></a>
                    <p style="font-size: 20px; margin: 0">(Quản Trị)</p>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Vui lòng đăng nhập để tiếp tục</p>

                    <form action="" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div style="margin-bottom: 1rem; color:red;">
                            @error('email')
                            <small class="help-block">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom: 1rem; color:red; font-size: 12px">
                            @error('password')
                            <small class="help-block">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" name="rmb">
                                    <label for="remember">
                                        Ghi nhớ
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <button type="submit" style="width: 105px" class="btn btn-primary btn-block">Đăng
                                    nhập</button>
                            </div>

                        </div>
                    </form>

                    <p class="mb-1">
                        <a href="forgot-password.html">Quên mật khẩu ?</a>
                    </p>
                    <p class="mb-0">
                        <a href="register.html" class="text-center">Đăng ký thành viên mới</a>
                    </p>
                </div>

            </div>

        </div>
    </div>


    <script src="{{url('admin_assets')}}/plugins/jquery/jquery.min.js"></script>

    <script src="{{url('admin_assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{url('admin_assets')}}/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>