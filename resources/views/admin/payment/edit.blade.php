@include('admin.layout.header')

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                @include('admin.layout.nav')
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

       
            <div id="page-wrapper" style="min-height: 577px;">
            <div class="row">
                <div class="col-lg-12" style="margin-top: 20px;">
                
              <a href="{{url('/payment')}}" type="button" class="btn btn-primary btn-md">Back</a>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class=" col-md-12">
                 
                    <div class="col-sm-10 panel panel-default">
                        <div class="panel-heading">
                            Add Payment
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php foreach($paymentEdit as $payment) { ?>
                                    <form role="form" method="post" action="">
                                        <?php echo csrf_field();?>
                                        <div class="form-group">
                                            <label>Membership ID</label>
                                            <input class="form-control" name="member_id" id="member_id" type="text" placeholder="" Value="<?=$payment->member_id;?>">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Member Name</label>
                                            <input class="form-control" name="name" id="name" type="text" placeholder="" Value="<?=$payment->name;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email ID</label>
                                            <input class="form-control" name="email" id="email" type="text" placeholder="" Value="<?=$payment->email;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input class="form-control" name="mobile" id="mobile" type="text" placeholder="" Value="<?=$payment->mobile;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input class="form-control" name="amount" id="amount" type="text" placeholder="" Value="<?=$payment->member_id;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>DSA Name</label>
                                            <select class="form-control" data-live-search="true">
                                              <option>Sandeep</option>
                                              <option>Kamal Kant</option>
                                              <option>Sugar, Spice and all things nice</option>
                                            </select>
                                        </div>
                                       
                                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                                        
                                    </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
            <!-- /.row -->
        </div>  
            
            <!-- /.row -->
            
          
            
@include('admin.layout.footer')