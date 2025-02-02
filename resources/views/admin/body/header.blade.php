@php
$currentTerm = App\Models\CurrentTerm::where('id',1)->value('term');
@endphp

<header>
	<div class="topbar d-flex align-items-center">
		<nav class="navbar navbar-expand">
			<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
			</div>
			<div class="search-bar flex-grow-1">
				<div class="position-relative search-bar-box">
					<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
					<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
				</div>
			</div>
			<div class="top-menu ms-auto">

				<ul class="navbar-nav align-items-center">
					<li class="nav-item mobile-search-icon">

						<a class="nav-link" href="#"> <i class='bx bx-search'></i>
						</a>
					</li>
					<li>Current Semester:<select style="border-color: white;" id="termSelect" onchange="updateCurrentTerm(this.value)">
							<option value="First" {{ $currentTerm === 'First' ? 'selected' : '' }}>First</option>
							<option value="Second" {{ $currentTerm === 'Second' ? 'selected' : '' }}>Second</option>
						</select>

						<script>
							function updateCurrentTerm(term) {
								fetch('/update-current-term', {
										method: 'POST',
										headers: {
											'Content-Type': 'application/json',
											'X-CSRF-TOKEN': '{{ csrf_token() }}'
										},
										body: JSON.stringify({
											term: term
										})
									})
									.then(response => response.json())
									.then(data => {
										if (data.success) {
											alert("Current semester updated successfully.");
										} else {
											alert("Failed to update current semester.");
										}
									})
									.catch(error => console.error("Error:", error));
							}
						</script>


					</li>
					<li class="nav-item dropdown dropdown-large" id="notify">
						<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count" id="countID">
								@php
								$ncount = Auth::user()->unreadNotifications()->count()
								@endphp
								{{ $ncount }}

							</span>
							<i class='bx bx-bell'></i>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<a href="javascript:;">
								<div class="msg-header">
									<p class="msg-header-title">Notifications</p>
									<p class="msg-header-clear ms-auto">Marks all as read</p>
								</div>
							</a>
							<div class="header-notifications-list">


								@php
								$user = Auth::user();
								@endphp

								@forelse($user->notifications as $notification)

								<div class="d-flex align-items-center">
									<div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
									</div>
									<div class="flex-grow-1">
										<h6 class="msg-name">Message <span class="msg-time float-end">{{ Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
											</span></h6>

										<p class="msg-info">

											@php
											$message = $notification->data['message'];
											if ($message == 'New Order Added in Shop' ){
											echo "<a class='dropdown-item' href='/pending/order'>".$message."</a>";
											}else if ($message == ' New Vendor Request' ){

											echo "<a class='dropdown-item' href='/inactive/vendor'>" .$message."</a>";;
											}else if ($message == 'New User Register In Shop' ){

											echo "<a class='dropdown-item' href='/all/user'>".$message."</a>";;
											}
											@endphp
										</p>

									</div>
								</div>

								@empty

								@endforelse


							</div>
							<a href="javascript:;">
								<div class="text-center msg-footer">View All Notifications</div>
							</a>
						</div>
					</li>
					<li class="nav-item dropdown dropdown-large">

						<div class="dropdown-menu dropdown-menu-end">
							<a href="javascript:;">
								<div class="msg-header">
									<p class="msg-header-title">Messages</p>
									<p class="msg-header-clear ms-auto">Marks all as read</p>
								</div>
							</a>
							<div class="header-message-list">









							</div>

						</div>
					</li>
				</ul>
			</div>


			@php
			$id = Auth::user()->id;
			$adminData = App\Models\User::find($id);

			@endphp

			<div class="user-box dropdown">
				<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">


					<img src="{{ (!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}" class="user-img" alt="user avatar">


					<div class="user-info ps-3">
						<p class="user-name mb-0">{{ Auth::user()->name }}</p>
						<p class="designattion mb-0">{{ Auth::user()->username }}</p>
					</div>
				</a>
				<ul class="dropdown-menu dropdown-menu-end">
					<li><a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="bx bx-user"></i><span>Profile</span></a>
					</li>
					<li><a class="dropdown-item" href="{{ route('admin.change.password') }}"><i class="bx bx-cog"></i><span>Change Password</span></a>
					</li>
					<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
					</li>

					<li>
						<div class="dropdown-divider mb-0"></div>
					</li>
					<li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const notify = document.getElementById('notify');


		notify.addEventListener('click', function(event) {

			fetch('/read_notice', {
					method: 'GET',

				})
				.then(response => response.json())
				.then(data => {

					if (data.success) {
						document.getElementById('countID').innerHTML = 0;
					} else {
						alert(data.message);
					}
				})
				.catch(error => console.error('Error:', error));

		});
	});
</script>
