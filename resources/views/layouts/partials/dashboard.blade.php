@role('admin')
<div class="content">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">

        <div class="card card-stats">
        <a href="{{ route('users.index') }}">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-globe text-warning"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Users</p>
                  <p class="card-title">{{ App\User::userCount() }}
                    <p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-refresh"></i> Update Now
            </div>
          </div>
          </a>
        </div>

      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
        <a href="{{ route('login-activities') }}">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-vector text-danger"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Login Activity</p>
                  <p class="card-title">
                    <p>
                </div>
              </div>
            </div>
          </div>
        </a>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-clock-o"></i> All Time
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-favourite-28 text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Visitors</p>
                  <p class="card-title">{{ App\Tracker::getCount() }}
                    <p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-refresh"></i>Per IP
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="fa fa-shopping-bag text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Products</p>
                  <p class="card-title">{{ App\Products::getCount() }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-shopping-bag"></i> Total
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endrole

@role('user')
<div class="content">
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="fa fa-shopping-bag text-primary"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Products</p>
              <p class="card-title">{{ App\Products::getCount() }}
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-shopping-bag"></i> Total
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endrole
