<div class= row> 
<nav id="sidebar" class="col-md-4 col-lg-3 d-md-block bg-light sidebar">
    <div class="position-sticky">
         @livewire('profile-settings')
        <ul class="nav flex-column">
            <li class="nav-item">
                <a wire:click.prevent="setActiveSection('my-account')" class="nav-link {{ $activeSection === 'my-account' ? 'active' : '' }}" href="#" style="color: gray;">
                    <i class="far fa-user"  style="color: gray;"></i> My Account
                </a>
            </li>
            <li class="nav-item">
                <a wire:click.prevent="setActiveSection('my-purchases')" class="nav-link {{ $activeSection === 'my-purchases' ? 'active' : '' }}" href="#"style="color: gray;">
                    <i class="fas fa-box"  style="color: gray;"></i> My Purchases
                </a>
            </li>
            <li class="nav-item">
                <a wire:click.prevent="setActiveSection('ratings-reviews')" class="nav-link {{ $activeSection === 'ratings-reviews' ? 'active' : '' }}" href="#"style="color: gray;">
                    <i class="far fa-star"  style="color: gray;"></i> Ratings and Reviews
                </a>
            </li>
            <li class="nav-item">
                <a wire:click.prevent="setActiveSection('liked-product')" class="nav-link {{ $activeSection === 'liked-product' ? 'active' : '' }}" href="#" style="color: gray;">
                   <i class="far fa-heart" style="color: gray;"></i> Liked Products
                </a>
           </li>
        </ul>
    </div>
</nav>

<main class="col-md-8 ms-sm-auto col-lg-9 px-md-4 custom-main">
    <div class="{{ $activeSection === 'my-account' ? '' : 'd-none' }}">
        <h2 class="section-title">Manage your Account Details</h2>
        <p class="section-description">Update your account's profile information and email address.</p>
        @livewire('my-account')
    </div>
    <div class="{{ $activeSection === 'my-purchases' ? '' : 'd-none' }}">
        <h2>My Purchases</h2>
        @livewire('orders')
    </div>
    <div class="{{ $activeSection === 'ratings-reviews' ? '' : 'd-none' }}">
        <h2>Ratings and Reviews</h2>
    </div>
    <div class="{{ $activeSection === 'liked-product' ? '' : 'd-none' }}">
        @livewire('liked-product')
    </div>
</main>
</div>