<?php 
    $uploadTo = "img/"; 
    $allowedImageType = array('jpg','png','jpeg','gif','pdf','doc');
    $imageName = $_FILES['pass_image']['name'];
    $tempPath=$_FILES["pass_image"]["tmp_name"];
   
    $basename = basename($imageName);
    $originalPath = $uploadTo.$basename; 
    $imageType = pathinfo($originalPath, PATHINFO_EXTENSION); 
    move_uploaded_file($tempPath,$originalPath);
    
?>

<!-- Start preview -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government of Bahamas Passport form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" integrity="sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA==" crossorigin="anonymous" referrerpolicy="no-referrer" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer" async defer></script>
    <script src="encode.js" async defer></script>
</head>
<style>
    label {
        font-weight: bold;
    }
</style>
<body class="">
    <form class="mb-5" id="contentToPrint">
        <header class="container">
            <img src="government bahamas.png" alt="Government of bahamas">
            <div class="text-center container">
                <h1><u> Bahamas Passport Application Form </u></h1>
            </div>
        </header>
        <section class="container">
            <!-- Application ID -->
            <div class="mb-3">
                <strong><u>For official use only</u></strong>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <section class="mb-5">
                        <label for="Application_id">Application ID</label>
                        <input class="form-control w-25 d-inline" type="number" name="Application_id" id="Application_id" value="<?php echo $_POST["Application_id"] ?>" disabled>
                    </section>
                    <!-- Application Type -->
                    <section class="mb-3">
                        <h4>Application Type:</h4>
                        <p><?php echo $_POST["apptype"] ?></p>
                    </section>
                </div>
                <div class="col text-end">
                    <img src="<?php echo $originalPath ?>" style="width: 225px; height: 225px;">
                </div>
            </div>

        </section>
        <main>
        <hr>
        <!-- 1. Personal Details -->
       <section class="my-3 container">
        <h3>1. PERSONAL DETAILS:</h3>
        <section class="my-3">
            <h5>Title:</h5>
            <p><strong><?php echo $_POST["title"] ?></strong></p>
        </section>
        <hr>
        <div class="row mb-4">
            <div class="col">
                <label for="surname">Surname</label>
                <input class="form-control" type="text" name="surname" id="surname" value="<?php echo $_POST["surname"] ?>" placeholder="Surname" disabled>
            </div>

            <div class="col">
                <label for="firstname">First Name</label>
                <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo $_POST["firstname"] ?>" placeholder="First Name" disabled>
            </div>
            <div class="col">
                <label for="middlename">Middle Name(s)</label>
                <input class="form-control" type="text" name="middlename" id="middlename" value="<?php echo $_POST["middlename"] ?>" placeholder="Middle Name(s)" disabled>
            </div>
        </div>
        <hr>
        <div class="row mb-4">
            <div class="col">
                <label for="maiden_surname">Maiden Surname</label>
                <input class="form-control" type="text" name="maiden_surname" id="maiden_surname" value="<?php echo $_POST["maiden_surname"] ?>" placeholder="Maiden Surname" disabled>
            </div>
            <div class="col">
                <label for="birthplace">Place and Country of Birth</label>
                <input class="form-control" type="text" name="birthplace" id="birthplace" value="<?php echo $_POST["birthplace"] ?>" placeholder="Place, Country of Birth" disabled>
            </div>
            <div class="col">
                <label for="DOB">Date of Birth <em>(DD/MM/YYYY)</em></label>
                <input class="form-control" type="date" name="DOB" id="DOB" value="<?php echo $_POST["DOB"] ?>" placeholder="Date of Birth (DD/MM/YYYY)" disabled>
            </div>
        </div>
        <hr>
        <div class="row mb-4">
            <div class="col-5">
                <label for="height">Height</label>
                <div class="row">
                    <div class="col">
                        <input class="form-control" type="number" name="feett" value="<?php echo $_POST["feett"] ?>" id="height" placeholder="Feet" disabled> ft.
                    </div>
                    <div class="col">
                        <input class="form-control" type="number" name="inches" value="<?php echo $_POST["inches"] ?>" id="height" placeholder="Inches" disabled> ins.
                    </div>
                </div>    
            </div>
            <div class="col">
                <label for="eyecolor">Colour of Eyes</label>
                <input class="form-control" type="text" name="eyecolor" id="eyecolor" value="<?php echo $_POST["eyecolor"] ?>" placeholder="Colour of Eyes" disabled>
            </div>
            <div class="col">
                <label for="haircolor">Colour of Hair</label>
                <input class="form-control" type="text" name="haircolor" id="haircolor" value="<?php echo $_POST["haircolor"] ?>" placeholder="Colour of Hair" disabled>
            </div>
            <div class="col">
                <label for="nationality">Nationality</label>
                <input class="form-control" type="text" name="nationality" id="nationality" value="<?php echo $_POST["nationality"] ?>" placeholder="Nationality" disabled>
            </div>
        </div>
        <hr>
        <div class="row mb-4">
            <div class="col">
                <label for="identity-marks">Visible Identification Marks (please note in detail)</label>
                <input class="form-control" type="text" name="identity-marks" id="identity-marks" value="<?php echo $_POST["identity-marks"] ?>" disabled>        
            </div>
            <div class="col">
                <label for="national-insurance">National Insurance No.</label>
                <input class="form-control" type="text" name="national-insurance" id="national-insurance" value="<?php echo $_POST["national-insurance"] ?>" disabled>
            </div>
            <div class="col">
                <section>
                    <h5>Sex</h5>
                    <p><strong><?php echo $_POST["gender"] ?></strong></p>
                </section>
            </div>
        </div>
        <!-- End of section -->
       </section>

       <hr>

       <!-- 2. Contact Details -->
        <section class="container">
            <h3>2. CONTACT DETAILS:</h3>
            <section class="row mb-3">
                <div class="col">
                    <label for="present-add">Present Address <em>( Apt. No. P.O.Box, Street, City, State & Country )</em></label>
                    <input class="form-control" type="text" name="present-add" id="present-add" value="<?php echo $_POST["present-add"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="permanent-add">Permanent Address <em>( Apt. No. P.O.Box, Street, City, State & Country )</em></label>
                    <input class="form-control" type="text" name="permanent-add" id="permanent-add" value="<?php echo $_POST["permanent-add"] ?>" disabled>
                </div>    
            </section>
            
            <section class="row mb-3">
                <div class="col">
                    <label for="telephone">Telephone <em>Home & Work</em> </label>
                    <input class="form-control" type="tel" name="telephone" id="telephone" value="<?php echo $_POST["telephone"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="email">Email <em>(optional)</em> </label>
                    <input class="form-control" type="email" name="email" id="email" value="<?php echo $_POST["email"] ?>" disabled>
                </div>
            </section>
            <!-- End of section -->
        </section>
        <hr>
        <!-- 3. Employment Details -->
        <section class="container">
            <h3>3. EMPLOYMENT DETAILS:</h3>
            <div class="row mb-3">
                <div class="col">
                    <label for="occupation">Occupation</label>
                    <input class="form-control" type="text" id="occupation" name="occupation" value="<?php echo $_POST["occupation"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="employer-name">Employer Name <em>(if applicable)</em></label>
                    <input class="form-control" type="text" id="employer-name" name="employer-name" value="<?php echo $_POST["employer-name"] ?>" disabled><br>
        
                    <label for="employer-address">Employer Address <em>(if applicable)</em></label>
                    <input class="form-control" type="text" id="employer-address" name="employer-address" value="<?php echo $_POST["employer-address"] ?>" disabled><br>
        
                    <label for="employer-telephone">Employer Telephone <em>(if applicable)</em></label>
                    <input class="form-control" type="text" id="employer-telephone" name="employer-telephone" value="<?php echo $_POST["employer-telephone"] ?>" disabled>
                </div>
            </div>
        <!-- End of section -->
        </section>
        <hr>
        <!-- 4. Family Details -->
        <section class="my-4 container">
            <h3>4. FAMILY DETAILS:</h3>
            <section class="row mb-4">
                <h4>Father</h4>
                <div class="col">
                    <label for="father-surname">Surname</label>
                    <input class="form-control" type="text" name="father-surname" id="father-surname" value="<?php echo $_POST["father-surname"] ?>" disabled>
                </div>              
                <div class="col">
                    <label for="father-othernames">Other Name</label>
                    <input class="form-control" type="text" name="father-othernames" id="father-othernames" value="<?php echo $_POST["father-othernames"] ?>" disabled>
                </div>              
                <div class="col">
                    <label for="father-country">Country of Birth</label>
                    <input class="form-control" type="text" name="father-country" id="father-country" value="<?php echo $_POST["father-country"] ?>" disabled>
                </div>         
                <div class="col">
                    <label for="father-nation">Nationality</label>
                    <input class="form-control" type="text" name="father-nation" id="father-nation" value="<?php echo $_POST["father-nation"] ?>" disabled>
                </div>     
                <div class="col">
                    <label for="father-dob">Date of Birth <em>(DD/MM/YYYY)</em></label>
                    <input class="form-control" type="date" name="father-dob" id="father-dob" value="<?php echo $_POST["father-dob"] ?>" disabled>
                </div>            
            </section>

            <section class="row mb-4">
                <h4>Mother</h4>
                <div class="col">
                    <label for="mother-surname">Surname</label>
                    <input class="form-control" type="text" name="mother-surname" id="mother-surname" value="<?php echo $_POST["mother-surname"] ?>" disabled>
                </div>            
                <div class="col">
                    <label for="mother-othernames">Other Name</label>
                    <input class="form-control" type="text" name="mother-othernames" id="mother-othernames" value="<?php echo $_POST["mother-othernames"] ?>" disabled>
                </div>              
                <div class="col">
                    <label for="mother-country">Country of Birth</label>
                    <input class="form-control" type="text" name="mother-country" id="mother-country" value="<?php echo $_POST["mother-country"] ?>" disabled>
                </div>          
                <div class="col">
                    <label for="mother-nation">Nationality</label>
                    <input class="form-control" type="text" name="mother-nation" id="mother-nation" value="<?php echo $_POST["mother-nation"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="mother-dob">Date of Birth <em>(DD/MM/YYYY)</em></label>
                    <input class="form-control" type="date" name="mother-dob" id="mother-dob" value="<?php echo $_POST["mother-dob"] ?>" disabled>
                </div>          
            </section>

            <section class="row mb-4">
                <h4>Spouse</h4>
                <div class="col">
                    <label for="spouse-surname">Surname</label>
                    <input class="form-control" type="text" name="spouse-surname" id="spouse-surname" value="<?php echo $_POST["spouse-surname"] ?>" disabled>
                </div>
                
                <div class="col">
                    <label for="spouse-othernames">Other Name</label>
                    <input class="form-control" type="text" name="spouse-othernames" id="spouse-othernames" value="<?php echo $_POST["spouse-othernames"] ?>" disabled>
                </div>
                
                <div class="col">
                    <label for="spouse-country">Country of Birth</label>
                    <input class="form-control" type="text" name="spouse-country" id="spouse-country" value="<?php echo $_POST["spouse-country"] ?>" disabled>
                </div>
                
                <div class="col">
                    <label for="spouse-nation">Nationality</label>
                    <input class="form-control" type="text" name="spouse-nation" id="spouse-nation" value="<?php echo $_POST["spouse-nation"] ?>" disabled>
                </div>
                
                <div class="col">
                    <label for="spouse-dob">Date of Birth <em>(DD/MM/YYYY)</em></label>
                    <input class="form-control" type="date" name="spouse-dob" id="spouse-dob" value="<?php echo $_POST["spouse-dob"] ?>" disabled>
                </div>
                
            </section>

            <section>
                <h5>Person to Contact in case of an emergency</h5>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emergency-name">Name</label>
                        <input class="form-control" type="text" name="emergency-name" id="emergency-name" value="<?php echo $_POST["emergency-name"] ?>" disabled>
                    </div>
                    <div class="col">
                        <label for="emergency-relationship">Relationship</label>
                        <input class="form-control" type="text" name="emergency-relationship" id="emergency-relationship" value="<?php echo $_POST["emergency-relationship"] ?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="emergency-address">Address</label>
                        <input class="form-control" type="text" name="emergency-address" id="emergency-address" value="<?php echo $_POST["emergency-address"] ?>" disabled>
                    </div>
                    <div class="col">
                        <label for="emergency-telephone">Telephone</label>
                        <input class="form-control" type="tel" name="emergency-telephone" id="emergency-telephone" value="<?php echo $_POST["emergency-telephone"] ?>" disabled>
                    </div>
                </div>      
            </section>
        </section>
        <hr>
        <!-- 5. Passport Details -->
        <section class="my-3 container">
            <h3>5. PASSPORT DETAILS <em>(only for previous passport holders):</em></h3>
            
            <section class="row mb-3">
                <div class="col">
                    <label for="bearer-name">Bearer's name at time of issue of previous passport</label>
                    <input class="form-control" type="text" id="bearer-name" name="bearer-name" value="<?php echo $_POST["bearer-name"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="bearer-passportnum">Passport Number</label>
                    <input class="form-control" type="text" id="bearer-passportnum" name="bearer-passportnum" value="<?php echo $_POST["bearer-passportnum"] ?>" disabled>
                </div>     
            </section>

           <section class="row mb-4">
                <section class="col form-control">
                    <h5>Status of Passport</h5>
                    <p><?php echo $_POST["PassportStatus"] ?></p>
                </section>
                <div class="col">
                    <label for="date-loststolen">Date Lost/Stolen <em>(DD/MM/YYYY)</em></label>
                    <input class="form-control" type="date" id="date-loststolen" name="date-loststolen" value="<?php echo $_POST["date-loststolen"] ?>" disabled>
                </div>     
                <div class="col">
                    <label for="place-loststolen">Place (Island/State/Country/Province), Country where lost/stolen</label>
                    <input class="form-control" type="text" id="place-loststolen" name="place-loststolen" placeholder="Place, Country" value="<?php echo $_POST["place-loststolen"] ?>" disabled>
                </div>      
            </section>

            <section class="row">
                <section class="col form-control">
                    <h5>Has loss been reported to police?</h5>
                    <p><?php echo $_POST["loss-option"] ?></p>
                </section>
                <div class="col">
                    <label for="police-report-station">Police Station</label>
                    <input class="form-control" type="text" name="police-report-station" id="police-report-station" value="<?php echo $_POST["police-report-station"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="police-report-datereport">Police Date of report</label>
                    <input class="form-control" type="date" name="police-report-datereport" id="police-report-datereport" value="<?php echo $_POST["police-report-datereport"] ?>" disabled>
                </div>
                <section class="col form-control">
                    <h4>Police report submitted?</h4>
                    <p><?php echo $_POST["report-submit-option"] ?></p>
                </section>
            </section>
            <!-- End of section -->
        </section>
        <hr>
        <!-- 6. Additional details -->
        <section class="my-3 container">
            <h3>6. ADDITIONAL DETAILS:</h3>
            <div class="row mb-3">
                <section class="col form-control">
                    <h6>Applicant a citizen of The Bahamas by:</h6>
                    <p><?php echo $_POST["citizen-origin"] ?></p>
                </section>

                <div class="col">
                    <label for="document-number">Document Number</label>
                    <input class="form-control" type="text" name="document-number" id="document-number" value="<?php echo $_POST["document-number"] ?>" disabled>
                </div>
            
                <div class="col">
                    <label for="place-of-document-issue">Place of Document Issue</label>
                    <input class="form-control" type="text" name="place-of-document-issue" id="place-of-document-issue" value="<?php echo $_POST["place-of-document-issue"] ?>" disabled>
                </div>
           
                <div class="col">
                    <label for="date-of-document-issue">Date of Document Issue</label>
                    <input class="form-control" type="date" name="date-of-document-issue" id="date-of-document-issue" value="<?php echo $_POST["date-of-document-issue"] ?>" disabled>
                </div>
                
            </div>     

            <div class="">
                    <h4>What other names have you used? <em>(list all alias)</em></h4>
                    1. <input class="form-control" type="text" name="othername1" value="<?php echo $_POST["othername1"] ?>" disabled><br>
                    2. <input class="form-control" type="text" name="othername2" value="<?php echo $_POST["othername2"] ?>" disabled><br>
                    3. <input class="form-control" type="text" name="othername3" value="<?php echo $_POST["othername3"] ?>" disabled><br>
                    4. <input class="form-control" type="text" name="othername4" value="<?php echo $_POST["othername4"] ?>" disabled><br>
                <h4>If name changed, state reason:</h4>
                <p><?php echo $_POST["name-change-origin"] ?></p>
            </div>
            <!-- End of section -->
        </section>

        <hr>

        <!-- 7. To be completed if persons born abroad -->
        <section class="my-3 container">
            <h3>7. TO BE COMPLETED IF PERSONS BORN ABROAD:</h3>
            <div class="row my-4">
                <h5>Mother</h5>
                <section class="col form-control">
                    <h6>Mother is a Citizen of The Bahamas by:</h6>
                    <p><?php echo $_POST["mother-citizen-origin"] ?></p>
                </section>
                <div class="col">
                    <label for="mother-document-number">Document Number</label>
                    <input class="form-control" type="text" name="mother-document-number" id="mother-document-number" value="<?php echo $_POST["mother-document-number"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="mother-place-of-document-issue">Place of Document Issue</label>
                    <input class="form-control" type="text" name="mother-place-of-document-issue" id="mother-place-of-document-issue" value="<?php echo $_POST["mother-place-of-document-issue"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="mother-date-of-document-issue">Date of Document Issue</label>
                    <input class="form-control" type="date" name="mother-date-of-document-issue" id="mother-date-of-document-issue" value="<?php echo $_POST["mother-date-of-document-issue"] ?>" disabled>
                </div>
            </div>

            <div class="row mb-3">
                <h5>Father</h5>
                <section class="col form-control">
                    <h6>Father is a Citizen of The Bahamas by:</h6>
                    <p><?php echo $_POST["father-citizen-origin"] ?></p>
                </section>
                <div class="col">
                    <label for="father-document-number">Document Number</label>
                    <input class="form-control" type="text" name="father-document-number" id="father-document-number" value="<?php echo $_POST["father-document-number"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="father-place-of-document-issue">Place of Document Issue</label>
                    <input class="form-control" type="text" name="father-place-of-document-issue" id="father-place-of-document-issue" value="<?php echo $_POST["father-place-of-document-issue"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="father-date-of-document-issue">Date of Document Issue</label>
                    <input class="form-control" type="date" name="father-date-of-document-issue" id="mother-date-of-document-issue" value="<?php echo $_POST["father-date-of-document-issue"] ?>" disabled>
                </div>
            </div>  

            <div class="row">
                <div class="col">
                    <label for="applicant-bahaconsul-register">If applicant's birth was registered at a Bahamian Consulate abroad, state the city where the Consulate is located</label>
                    <input class="form-control" type="text" name="applicant-bahaconsul-register" id="applicant-bahaconsul-register" value="<?php echo $_POST["applicant-bahaconsul-register"] ?>" disabled placeholder="City, Location of Consulate">
                </div>
                <div class="col">
                    <label for="register-cert-number">Registration Certificate Number</label>
                    <input class="form-control" type="text" name="register-cert-number" id="register-cert-number" value="<?php echo $_POST["register-cert-number"] ?>" disabled>  
                </div>
                <div class="col">
                    <label for="register-cert-date">Date of Registration <em>(DD/MM/YYYY)</em></label>
                    <input class="form-control" type="date" name="register-cert-date" id="register-cert-date" value="<?php echo $_POST["register-cert-date"] ?>" disabled>
                </div>
            </div>           
            <!-- End of section -->
        </section>

        <hr>
        <!-- 8. To be completed if child is under age 18 -->
        <section class="container">
            <h3>8. TO BE COMPLETED IF CHILD IS UNDER AGE 18:</h3>
            <div class="row">
                <div class="col">
                    <label for="under18-name">Full name <em>(mother, if unmarried; either parent, if married or legal guardian)</em></label>
                    <input class="form-control" type="text" name="under18-name" id="under18-name" value="<?php echo $_POST["under18-name"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="under18-child-relation">Relationship to Child</label>
                    <input class="form-control" type="text" name="under18-child-relation" id="under18-child-relation" value="<?php echo $_POST["under18-child-relation"] ?>" disabled>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="under18-present-address">Present Address <em>(including country)</em></label>
                    <input class="form-control" type="text" name="under18-present-address" id="under18-present-address" value="<?php echo $_POST["under18-present-address"] ?>" disabled>
                </div>
                <section class="col">
                    <h5>I hereby give my consent for (name of Applicant) to be issued a passport</h5>
                    <div class="row">
                        <div class="col">
                            <label for="under18-signature">Signature</label>
                            <input class="form-control" type="text" name="under18-signature" id="under18-signature" value="<?php echo $_POST["under18-signature"] ?>" disabled>
                        </div>
                        <div class="col">
                            <label for="under18-signature-date">Date <em>(DD/MM/YYYY)</em></label>
                            <input class="form-control" type="date" name="under18-signature-date" id="under18-signature-date" value="<?php echo $_POST["under18-signature-date"] ?>" disabled>
                        </div>
                    </div>
                </section>
            </div>           
            <!-- End of section -->
        </section>

        <hr>

        <!-- 9. Declaration of Applicant -->
        <section class="container">
            <h3>9. DECLARATION OF APPLICANT: </h3>
            <p>
                <strong>I, the undersigned, hereby apply for the issue of a passport. I declare that the information given in this application 
                    is correct to the best of my knowledge and belief, that I have the status of Bahamian citizen, and that I have not
                    renounced citizenship of The Bahamas. I further declare that:
                </strong>
            </p>

            <p><strong>
                <?php echo $_POST["never-held-or-applied"] ?>
            </strong></p>

            <p><strong>
                <?php echo $_POST["declaration_no"] ?>
            </strong></p>

            <div class="row">
                <div class="col">
                    <label for="declare-sign">Signature:</label>
                    <input class="form-control w-50" type="text" name="declare-sign" id="declare-sign" value="<?php echo $_POST["declare-sign"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="declare-date">Date:</label>
                    <input class="form-control w-50" type="date" name="declare-date" id="declare-date" value="<?php echo $_POST["declare-date"] ?>" disabled>
                </div>
            </div>      
            <!-- End of section -->
        </section>

        <hr>

        <!-- 10. Countersignature -->
        <section class="my-4 container">
            <h3>10. COUNTERSIGNATURE: <em>(Required for First Time and Lost or Stolen Applications only)</em></h3>

            <div class="row">
                <div class="col">
                    <label for="countersign-name">Full Name <em>(please print)</em></label>
                    <input class="form-control" type="text" name="countersign-name" id="countersign-name" value="<?php echo $_POST["countersign-name"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="countersign-profession">Profession</label>
                    <input class="form-control" type="text" name="countersign-profession" id="countersign-profession" value="<?php echo $_POST["countersign-profession"] ?>" disabled>
                </div>
            </div>

            <label for="countersign-present-address">Present Address <em>(including country)</em></label>
            <input class="form-control w-50" type="text" name="countersign-present-address" id="countersign-present-address" value="<?php echo $_POST["countersign-present-address"] ?>" disabled>
            <br><br>
            <hr>
            <p style="line-height: 16px;">
                I certify that the applicant has been known personally to me for <input class="form-control d-inline w-25 mb-4" type="number" name="counter-num-years" value="<?php echo $_POST["counter-num-years"] ?>" disabled>
            years and that to the best of my knowledge and believe the facts stated on this form are correct. I am a citizen of
            <input class="form-control d-inline w-25" type="text" name="counter-citizen" value="<?php echo $_POST["counter-citizen"] ?>" disabled> and I was born at <input class="form-control d-inline w-25" type="text" name="counter-place-of-birth" value="<?php echo $_POST["counter-place-of-birth"] ?>" disabled>.
            </p>
            <hr>

            <div class="row">
                <div class="col">
                    <label for="countersign-sign">Signature:</label>
                    <input class="form-control" type="text" name="countersign-sign" id="countersign-sign" value="<?php echo $_POST["countersign-sign"] ?>" disabled>
                </div>
                <div class="col">
                    <label for="countersign-date">Date <em>(DD/MM/YYYY)</em></label>
                    <input class="form-control" type="date" name="countersign-date" id="countersign-date" value="<?php echo $_POST["countersign-date"] ?>" disabled>
                </div>
            </div> 
            <!-- End of section -->
        </section>
         
    </main>
</form>
<div class="container">
    <button class="btn btn-success mb-5" onclick="Convert_HTML_To_PDF()">Save</button>
</div>
</body>
</html>
