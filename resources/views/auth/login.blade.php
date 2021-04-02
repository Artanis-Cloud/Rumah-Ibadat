
@extends('layouts.app')
@section('content')

	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="mb-5 text-center col-md-6">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="p-4 text-center text-wrap p-lg-5 d-flex align-items-center order-md-last" style="background: linear-gradient(135deg, #5cfcff 0%, #4da5e8 100%);">
							<div class="text w-100">
								<h2>Selamat Datang Ke Sistem Bantuan Kewangan Rumah Ibadat</h2>
								<p>Tiada Akaun?</p>
								<a href="{{ route('register') }}" class="btn btn-white btn-outline-white">Daftar Masuk</a>
							</div>
			      </div>
						<div class="p-4 login-wrap p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Log Masuk</h3>
                          </div>
			      	</div>
                      <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
			      		<div class="mb-3 form-group">
			      			<label class="label" for="name">Emel</label>
			      			<input type="text" name="email" class="form-control" placeholder="Emel" required>
			      		</div>
		            <div class="mb-3 form-group">
		            	<label class="label" for="password">Kata Laluan</label>
		              <input type="password" name="password" class="form-control" placeholder="Kata Laluan" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="px-3 form-control btn btn-primary submit">Log Masuk</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="text-left w-50">
                        </div>
                        <div class="w-50 text-md-right">
                            <a href="{{ route('password.request') }}">Terlupa Kata Laluan?</a>
                        </div>
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>


	</body>
@endsection
