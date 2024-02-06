<?php
// Mengaktifkan session pada PHP
session_start();

// Cek apakah pengguna sudah login dan memiliki level pegawai atau admin
if (!isset($_SESSION['username']) || ($_SESSION['level'] !== "pegawai" && $_SESSION['level'] !== "admin")) {
	// Jika tidak, redirect ke halaman login
	header("location:login_view.php");
	exit(); // Hentikan eksekusi kode selanjutnya
}
?>
<?php include('layout/header.php'); ?>

<div class="container-fluid">
	<div class="jumbotron text-center">
		<h1 class="mt-4">Selamat Datang di Mobile Legend Guide</h1>
		<p class="lead">Ingin belajar apa hari ini,
			<?php echo $_SESSION['username']; ?>?
		</p>
	</div>
	<div class="row">
		<div class="col-md-6 col-lg-4 col-xl-3">
			<h2 class="mb-4">Sedang Meta!</h2>
			<div id="cardSlider" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="card-group">
							<div class="card" style="width: 18rem;">
								<img src="https://static.wikia.nocookie.net/mobile-legends/images/4/4a/Hero321-portrait.png"
									class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Johnson</h5>
									<p class="card-text">Tank</p>
									<button class="btn btn-outline-dark">Selengkapnya</button>
								</div>
							</div>
							<div class="card" style="width: 18rem;">
								<img src="https://static.wikia.nocookie.net/mobile-legends/images/6/6b/Hero551-portrait.png"
									class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Angela</h5>
									<p class="card-text">Support</p>
									<a class="btn btn-outline-dark" href="content/angela.php">Selengkapnya</a>
								</div>
							</div>
							<div class="card" style="width: 18rem;">
								<img src="https://static.wikia.nocookie.net/mobile-legends/images/d/d0/Hero871-portrait.png"
									class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Baxia</h5>
									<p class="card-text">Tank Jungler</p>
									<button class="btn btn-outline-dark">Selengkapnya</button>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card-group">
							<div class="card" style="width: 18rem;">
								<img src="https://static.wikia.nocookie.net/mobile-legends/images/1/17/Hero481-portrait.png"
									class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Diggie</h5>
									<p class="card-text">Support</p>
									<button class="btn btn-outline-dark">Selengkapnya</button>
								</div>
							</div>
							<div class="card" style="width: 18rem;">
								<img src="https://static.wikia.nocookie.net/mobile-legends/images/8/88/Hero801-portrait.png"
									class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Guinevere</h5>
									<p class="card-text">Fighter Mage</p>
									<button class="btn btn-outline-dark">Selengkapnya</button>
								</div>
							</div>
							<div class="card" style="width: 18rem;">
								<img src="https://static.wikia.nocookie.net/mobile-legends/images/9/9f/Hero191-portrait.png"
									class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Minotaur</h5>
									<p class="card-text">Tank</p>
									<button class="btn btn-outline-dark">Selengkapnya</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Add more carousel items as needed -->
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#cardSlider" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#cardSlider" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
		<div class="col-md-6 col-lg-4 col-xl-3">
			<h2 class="mb-4">Sedang OP!</h2>
			<div id="cardSlider2" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="card-group">
							<div class="card" style="width: 18rem;">
								<img src="https://static.wikia.nocookie.net/mobile-legends/images/b/b8/Hero061-portrait.png"
									class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Tigreal</h5>
									<p class="card-text">Tank</p>
									<button class="btn btn-outline-dark">Selengkapnya</button>
								</div>
							</div>
							<div class="card" style="width: 18rem;">
								<img src="https://static.wikia.nocookie.net/mobile-legends/images/b/bc/Hero1131-portrait.png"
									class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Yin</h5>
									<p class="card-text">Assasin Fighter</p>
									<button class="btn btn-outline-dark">Selengkapnya</button>
								</div>
							</div>
							<div class="card" style="width: 18rem;">
								<img src="https://static.wikia.nocookie.net/mobile-legends/images/3/36/Hero381-portrait.png"
									class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Vexana</h5>
									<p class="card-text">Mage</p>
									<button class="btn btn-outline-dark">Selengkapnya</button>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="card-group">
							<div class="card" style="width: 18rem;">
								<img src="https://static.wikia.nocookie.net/mobile-legends/images/d/d8/Hero681-portrait.png"
									class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Lunox</h5>
									<p class="card-text">Mage Jungler</p>
									<button class="btn btn-outline-dark">Selengkapnya</button>
								</div>
							</div>
							<div class="card" style="width: 18rem;">
								<img src="https://static.wikia.nocookie.net/mobile-legends/images/0/0f/Hero991-portrait.png"
									class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Barats</h5>
									<p class="card-text">Tank Jungler</p>
									<button class="btn btn-outline-dark">Selengkapnya</button>
								</div>
							</div>
							<div class="card" style="width: 18rem;">
								<img src="https://static.wikia.nocookie.net/mobile-legends/images/0/0b/Hero581-portrait.png"
									class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Martis</h5>
									<p class="card-text">Fighter Jungler</p>
									<button class="btn btn-outline-dark">Selengkapnya</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Add more carousel items as needed -->
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#cardSlider2" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#cardSlider2" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</div>
</div>
<?php include('layout/footer.php'); ?>