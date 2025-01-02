<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOÇLUK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        header {
            background-color: #9055FD;
            color: white;
        }
        .btn-primary-custom {
            background-color: #9055FD;
            border-color: #9055FD;
            border-radius: 5px;
        }
        .btn-primary-custom:hover {
            background-color: #7745D6;
            border-color: #7745D6;
        }
        .btn-secondary-custom {
            border: 2px solid #9055FD;
            color: #9055FD;
            border-radius: 8px;
            background-color: white;
        }
        .btn-secondary-custom:hover {
            background-color: #f3e9ff;
            border-color: #7745D6;
            color: #7745D6;
        }
        .hero {
            background: #f8f9fa;
            padding: 100px 20px;
            text-align: center;
        }
        .features {
            padding: 50px 20px;
        }
        .team {
            background: #f1f1f1;
            padding: 50px 20px;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #9055FD;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <div class="container d-flex justify-content-between align-items-center p-3">
            <h1 class="h4 m-0">Öğrenci Koçluk Sistemi</h1>
            <div>
                <a href="{{url('login')}}" class="btn btn-outline-light me-2 btn-primary-custom text-white">Giriş Yap</a>
                <a href="{{url('register')}}" class="btn btn-secondary-custom">Kayıt Ol</a>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h2>Biz Kimiz?</h2>
            <p>Öğrenci Koçluk Sistemi olarak, öğrencilerin akademik ve kişisel gelişimlerini desteklemek için buradayız.</p>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2>Ne Yapıyoruz?</h2>
            <div class="row">
                <div class="col-md-4">
                    <h3>Akademik Koçluk</h3>
                    <p>Öğrencilerin akademik başarılarını artırmak için bireysel rehberlik sunuyoruz.</p>
                </div>
                <div class="col-md-4">
                    <h3>Kariyer Danışmanlığı</h3>
                    <p>Kariyer hedeflerinizi belirlemenize ve bu hedeflere ulaşmanıza yardımcı oluyoruz.</p>
                </div>
                <div class="col-md-4">
                    <h3>Kişisel Gelişim</h3>
                    <p>Öğrencilerin güçlü yönlerini keşfetmeleri ve geliştirmeleri için destek sağlıyoruz.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="team">
        <div class="container">
            <h2>Ekibimiz</h2>
            <p>Deneyimli koçlardan oluşan ekibimizle öğrencilerimize en iyi hizmeti sunmayı hedefliyoruz.</p>
        </div>
    </section>

    <footer>
        <p>© 2025 Öğrenci Koçluk Sistemi. Tüm hakları saklıdır.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
