<?php 
    include 'hobby.php';
    ?>
    
    <div class="container">
        <div class=" text-center mt-5 ">
            
            <h1 >Contact Form</h1>
            
            
        </div>
        
        
        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">
                        
                        <div class = "container">
                            <form id="contact-form" role="form">
                                
                                
                                
                                <div class="controls">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_name">Firstname *</label>
                                                <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_lastname">Lastname *</label>
                                                <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_email">Email *</label>
                                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_need">Title*</label>
                                                <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                                                    <option value="" selected disabled>--Select Your Title--</option>
                                                    <option >Mr.</option>
                                                    <option >Mrs.</option>
                                                    <option >Miss</option>
                                                    <option >Ms.</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mt-3">
                                        <label class="mb-2 d-block">Raison du contact *</label>
                                        
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>
                                            <label class="form-check-label" for="radio1">Work with us</label>
                                        </div>
                                        
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                            <label class="form-check-label" for="radio2">Suggestions</label>
                                        </div>
                                        
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="radio3" name="optradio" value="option3">
                                            <label class="form-check-label" for="radio3">Report a problem</label>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_message">Message *</label>
                                                <textarea id="form_message" name="message" class="form-control" placeholder="Write your message here." rows="4" required="required" data-error="Please, leave us a message."></textarea
                                                    >
                                                </div>
                                                
                                            </div>
                                            
                                            
                                            <div class="col-md-12">
                                                
                                                <input type="submit" class="btn btn-success btn-send  pt-2 btn-block
                                                " value="Send Message" >
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        
                    </div>
                    <!-- /.8 -->
                    
                </div>
                <!-- /.row-->
                
            </div>
        </div>