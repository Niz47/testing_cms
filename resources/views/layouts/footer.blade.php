<!-- Footer -->
     <section class="footer">
          <div class="container">
               <div class="row">
                    <div class="col-md-4 col-sm-5 col-xs-12">
                         <div class="row">
                              <!-- <p>Testing 1</p> -->
                              <div class="col-md-6 col-sm-7 col-xs-5">
                                   @if(App::isLocale('en'))
                                        <a href="{{url('/lang/my')}}"><img src="images/changeLanguage-mm.png" class="changelang"></a>
                                   @else
                                       <a href="{{url('/lang/en')}}"><img src="images/changeLanguage-en.png" class="changelang">
                                   @endif
                              </div>
                              <div class="col-md-0 col-sm-0 col-xs-3"></div>
                              <div class="col-md-6 col-sm-5 col-xs-4">
                                   <div class="row">
                                        <div class="col-md-4 col-sm-4 col-xs-4 icon"><a href="#"><img src="images/facebook-icon.png"></a></div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 icon"><a href="#"><img src="images/mail-icon.png"></a></div>
                                        <div class="col-md-4 col-sm-4 col-xs-4 icon"><a href="#"><img src="images/customercare-icon.png"></a></div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-4 col-sm-2 col-xs-0"></div>
                    <div class="col-md-4 col-sm-5 col-xs-12">
                         <div class="row app">
                              <div class="col-md-6 col-sm-6 col-xs-6 download-txt"><span>Download the App Today</span></div>
                              <div class="col-md-3 col-sm-3 col-xs-3 googleplay"><a href="#"><img src="images/googleplay.png"></a></div>
                              <div class="col-md-3 col-sm-3 col-xs-3 appstore"><a href="#"><img src="images/app_store.png"></a></div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
