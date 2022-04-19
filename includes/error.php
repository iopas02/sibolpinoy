<?php
    $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($fullUrl, "error=message_failed") == true ){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="bi bi-exclamation-triangle-fill"></i><strong> Message Sending Failed!</strong> Please Try Again.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }    
    else if(strpos($fullUrl, "error=client_info_invalid") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Information is Invalid!</strong> Please check your information before sending.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';  
    }else if(strpos($fullUrl, "error=Message_not_sent") == true ){
        echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Message Not Sent!</strong> Please Try Again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=email_is_invalid") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Invalid Email!</strong> Please check your email format before sending.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=empty_fields") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Some Field are empty!</strong> Please check and fill up all fields before submitting.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=consultation_list_error") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Consultation list error!</strong> Please check and select your desired agenda.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=consultation_request_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Your consultation request is failed to sent!</strong> Please try again, Fill up all fields and carefully check and select your desired agenda.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=user_info_invalid") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Information is Invalid!</strong> Please check your information before sending.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=please_select_atleast_one_agenda") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Please Select your agenda!</strong> select atleast one agenda before sending.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=empty_field") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Empty field!</strong> Please fill up all fields and select atleast one aganeda before sending.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=event_reservation_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Event Registration Failed</strong> Please fill up carefully all fields before sending.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=consultation_successfully_send") == true ){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Your consultation request is successfully sent!</strong> Please check your email to verify all information request and wait for approval message, Thank you!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=message_sent") == true ){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Message Successfully Sent!</strong> We will reply to your query once we read your concern, Thank you!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=event_registration_sent") == true ){
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Event Registration Successfully Sent!</strong> Please check your email to verify all information request and wait for approval message, Thank you!.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
?>