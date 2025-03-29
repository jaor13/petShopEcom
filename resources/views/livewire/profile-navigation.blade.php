<div class="row main-box ">
    <nav id="" class="col-md-4 col-lg-3 d-md-block  p-1">
    <div class="{{ $activeSection === 'my-account' ? '' : 'd-none' }}">
    <h4 class="section-title " style="color: #4F4F4F;">Manage Account Details</h4>
    </div>
    <div class="{{ $activeSection === 'my-purchases' ? '' : 'd-none' }}">
    <h4 class="section-title"  style="color: #4F4F4F;">My Purchases</h4>
    </div>
    <div class="{{ $activeSection === 'ratings-reviews' ? '' : 'd-none' }}">
    <h4 class="section-title" style="color: #4F4F4F;">Ratings and Reviews</h4>
    </div>
    <div class="{{ $activeSection === 'liked-product' ? '' : 'd-none' }}">
    <h4 class="section-title" style="color: #4F4F4F;">My Likes</h4>
    </div>
        <div class="position-sticky bg-white">
            @livewire('profile-settings')
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a wire:click.prevent="setActiveSection('my-account')"
                        class="nav-link {{ $activeSection === 'my-account' ? 'active' : '' }}" href="#">
                        <i class="fas fa-user mr-2 ml-5 p-2"></i> My Account
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:click.prevent="setActiveSection('my-purchases')"
                        class="nav-link {{ $activeSection === 'my-purchases' ? 'active' : '' }}" href="#">
                        <i class="fas fa-box mr-2 ml-5 p-2"></i> My Purchases
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:click.prevent="setActiveSection('ratings-reviews')"
                        class="nav-link {{ $activeSection === 'ratings-reviews' ? 'active' : '' }}" href="#">
                        <i class="fas fa-star ml-5 p-2 fix-cust-1"></i> Ratings & Reviews
                    </a>
                </li>

                <li class="nav-item ">
                    <a wire:click.prevent="setActiveSection('liked-product')"
                        class="nav-link {{ $activeSection === 'liked-product' ? 'active' : '' }}" href="#">
                        <i class="fas fa-heart ml-5 p-2 fix-cust"></i> Liked Products
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="col-md-8 ms-sm-auto col-lg-9 p-0" >
        <div class="{{ $activeSection === 'my-account' ? '' : 'd-none' }}" style="margin-top: 40px;" > 
            @livewire('my-account')
        </div>
        <div class="{{ $activeSection === 'my-purchases' ? '' : 'd-none' }}  "  style="margin-top: 49px;">
            @livewire('orders')
        </div>
        <div class="{{ $activeSection === 'ratings-reviews' ? '' : 'd-none' }} " style="margin-top: 49px;">
            @livewire('reviews')
        </div>
        <div class="{{ $activeSection === 'liked-product' ? '' : 'd-none' }}"  style="margin-top: 49px;"> 
            @livewire('liked-product')
        </div>
    </main>
</div>
