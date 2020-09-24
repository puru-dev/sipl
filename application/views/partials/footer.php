    <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                           
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    2020 © SIPL
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

     

        <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>


    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/libs/jquery-vectormap/jquery-jvectormap-world-mill-en.js"></script>

    <script src="assetes/js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script> -->


    <!-- Peity chart-->
    <script src="assets/libs/peity/jquery.peity.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.ui.scrolltabs.js"></script>


    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    <script>
        var $tabs;
        var scrollEnabled;
        $(function() {

                $('#example_3').scrollTabs({
                    scrollOptions: {
                        easing: 'swing',
                        enableDebug: false,
                        // closable: true,
                        showFirstLastArrows: false,
                        selectTabAfterScroll: true
                    }
                });
            }


        );

    </script>
    <script>
        $(".book_app").click(function() {
            var id=$(this).attr("id");
            $("#select_dr"+id).toggle();
        });

        $(function() {
            $('.address_id').change(function(e) {
                var data=$(this).attr("data");
                $('#example_'+data).hide();
                 var id=this.value;
                e.preventDefault();
                $.ajax({
                 
                  type: 'POST',
                   url: '<?php echo base_url();?>' + 'drop_in_center/slots',
                   dataType: 'json',
                   data: {location_id: id},
                  success: function(dataResult) {
                    $("#tablist"+data).html("");
                    var bodyData = '';
                    var i=1;
                    $("#slots"+data).html("");
                    var slotsData = '';
                    var j=1;
                    if(dataResult.timeslots){
                    $.each(dataResult.timeslots,function(index,row){
                        
                       bodyData+='<li role="tab">'
                       bodyData+='<a href="#tabs-'+i+data+'"  class="text-center ui-tabs-anchor" role="presentation" tabindex="-1" onclick=aclick('+i+data+')>'
                                 +row.show_date+'<br>'
                                '</a>';
                        bodyData+='</li>';
                        i++;
                        })
                    $.each(dataResult.timeslots,function(index,row){
                    if (!row.slotes) {

                      slotsData+='<div id="tabs-'+j+data+'" role="tabpanel" aria-labelledby="ui-id-'+j+data+'" class="ui-tabs-panel ui-corner-bottom ui-widget-content" aria-hidden="true" style="display: none;"><div class="col-md-12 text-center mb-4"><b>'+row.show_date+'</b></div><div class="col-md-12 mb-2"><b>No Slots Availabel</b>';
                     slotsData+='</div>';
                     slotsData+='</div>';
                    }else{  
                        $.each(row.slotes,function(index1,row1){
                    slotsData+='<div id="tabs-'+j+data+'" role="tabpanel" style="display:none" class="forempty"><div class="col-md-12 text-center mb-4"><b>'+row.show_date+'</b></div><div class="col-md-12 mb-2"><b>'+index1+'</b></div>';
                    slotsData+='<div class="col-md-12 mb-3">';
                         $.each(row1,function(index2,row2){
                    slotsData+='<a href="<?=base_url()?>appointment-details"> <button class="btn btn-sm btn-outline-primary mr-2">'+row2+''+
                                '</button></a>';
                                 })
                            '</div>';
                       
                        slotsData+='</div>';
                    })
                    }
                    j++;
                   })
                    }else{
                        bodyData+='<li role="tab">'
                        bodyData+='<h3>No Record Found<h3>'
                        bodyData+='</li>';
                    }                                                
                    $('#example_'+data).show();
                    $("#tablist"+data).append(bodyData);
                    $("#slots"+data).append(slotsData);
                  }

              });
            });
        });

        function aclick(id) {
            $("#tabs-"+id).show();
        }
    </script>

        
    </body>


</html>