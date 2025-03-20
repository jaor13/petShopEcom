<div class= "row main-box bg-light"> 
<nav id="sidebar" class="col-md-4 col-lg-3 d-md-block sidebar rounded-3">
    <div class="position-sticky">
         @livewire('profile-settings')
        <ul class="nav flex-column">
            <li class="nav-item">
                <a wire:click.prevent="setActiveSection('my-account')" class="nav-link {{ $activeSection === 'my-account' ? 'active' : '' }}" href="#">
                    <i class="far fa-user mr-2 ml-5 p-2"></i> My Account
                </a>
            </li>
            <li class="nav-item">
                <a wire:click.prevent="setActiveSection('my-purchases')" class="nav-link {{ $activeSection === 'my-purchases' ? 'active' : '' }}" href="#">
                    <i class="fas fa-box mr-2 ml-5 p-2"></i> My Purchases
                </a>
            </li>
            <li class="nav-item">
                <a wire:click.prevent="setActiveSection('liked-product')" class="nav-link {{ $activeSection === 'liked-product' ? 'active' : '' }}" href="#">
                    <i class="far fa-heart ml-5 p-2 fix-cust"></i> Liked Products
                </a>
            </li>
        </ul>
    </div>
</nav>

<main class="col-md-8 ms-sm-auto col-lg-9 px-md-4 custom-main p-4 ">
    <div class="{{ $activeSection === 'my-account' ? '' : 'd-none' }}">
        <h2 class="section-title">Manage Account Details</h2>
        <p class="section-description">Update your account's profile information and email address.</p>
        @livewire('my-account')
    </div>
    <div class="{{ $activeSection === 'my-purchases' ? '' : 'd-none' }}">
        <h2 class="section-title">My Purchases</h2>
        @livewire('orders')
    </div>
    <div class="{{ $activeSection === 'ratings-reviews' ? '' : 'd-none' }}">
        <h2 class="ml-3">Ratings and Reviews</h2>
    </div>
    <div class="{{ $activeSection === 'liked-product' ? '' : 'd-none' }}">
        <h2 class="section-title">Liked Products</h2>
        @livewire('liked-product')
    </div>
</main>
</div>