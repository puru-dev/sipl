   <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
   <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">ISDQI</a></li>

                                        <li class="breadcrumb-item active">Drop-In Center</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Drop-In Center </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">

                        <div class="col-md-12">
                            <div class="card-box">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a href="#request-ass" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                            <span class="d-inline-block d-sm-none"></span>
                                            <span class="d-none d-sm-inline-block">Request Assisstance</span>
                                        </a>
                                    </li>



                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="request-ass">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="">Search Navigator </label>
                                                <input type="text" class="form-control" name="" id="" value="" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-10">
                                                <?php if (!empty($curl_response['drop_in_navigator_list'])) {?>
                                               <?php foreach (@$curl_response['drop_in_navigator_list'] as $key => $value) {?>
                                                <div class="widget-rounded-circle card-box">

                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <div class="avatar-lg">
                                                                <img src="http://localhost/ISDQI/isdqi-app/assets/images/users/avatar-1.jpg" class="img-fluid rounded-circle" alt="user">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <h5 class="mt-0"><?=@$value->navigator_name?></h5>
                                                            <p class="text-muted mb-1 font-13">11 Main 
                                                                <?=@$value->navigator_location[$key]?></p>

                                                        </div>
                                                        <div class="col-md-4 text-right">
                                                            <button class="btn btn-primary btn-sm book_app" id="<?=$key?>">Book Appointment</button>
                                                        </div>
                                                    </div>

                                                    <div class="mt-3" id="select_dr<?=$key?>" style="display:none">
                                                        <div class="form-group col-md-8">
                                                            <label for="">Select Address</label>
                                                            <select class="form-control chosen-select-deselect address_id" name="address_id<?=$key?>" data="<?=$key?>" id="address_id<?=$key?>">
                                                                <option value=""></option>
                                                                <?php foreach (@$value->navigator_location as $key1 => $value1) {?>
                                                                <option   value="<?=$value->location_id[$key1]?>"><?=@$value1?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    
                                                        <script>
                                                            var scrollEnabled = true;

                                                        </script>


                                                        <div id="example_<?=@$key?>" class="p-3 b1 slots" style="display:none">
                                                            <ul role="tablist" id="tablist<?=$key?>" class="tablist">
                                                            </ul>
                                                            <div id="slots<?=$key?>">
                                                            
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                             <?php }}?>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- </div> -->

                                </div>
                            </div> <!-- end col -->




                        </div>

                    </div>



                </div> <!-- container -->

            </div> <!-- content -->