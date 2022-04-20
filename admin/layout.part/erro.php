<?php
    $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($fullUrl, "error=username_empty") == true ){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="bi bi-exclamation-triangle-fill"></i><strong> Username is empty field!</strong> Please Fill up all fields.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }else if(strpos($fullUrl, "error=password_empty") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Password is empty field!</strong> Please Fill up all fields.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';  
    }else if(strpos($fullUrl, "error=sql_error") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Connection error!</strong> Please check your web or local hosting.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';  
    }else if(strpos($fullUrl, "error=wrong_password") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Wrong password!</strong> You Enter wrong password.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';  
    }else if(strpos($fullUrl, "error=inactive_or_deleted") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Username is inactive or deleted!</strong> Please ask your superior to check your account.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';  
    }else if(strpos($fullUrl, "error=username_not_exist") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Username is not exist!</strong> Please ask your superior to create for your account.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';  
    }else if(strpos($fullUrl, "error=username_already_exist") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Username is already been used!</strong> Please try other username.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';  
    }else if(strpos($fullUrl, "error=admin_profile_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Failed to save admin information</strong> Please check your fields and database attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=create_new_admin_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Failed to create an account for new admin</strong> Please check your fields and database attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=firstName_empty") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Firts name is empty field</strong> Please fill up carefully all field before submitting.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=lastName_empty") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Last name is empty field</strong> Please fill up carefully all field before submitting.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=username_empty") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Username is empty field</strong> Please fill up carefully all field before submitting.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=level_empty") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Level selection is empty field</strong> Please fill up carefully all field before submitting.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=status_empty") == true ){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Status selection is empty field</strong> Please fill up carefully all field before submitting.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=password_reset_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> User Password failed to reset</strong> Please fill up carefully all field before submitting.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=reason_empty") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Reason is empty field</strong> Please fill up reason field before submitting.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=error_self_delete") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> You cannot delete your own account</strong> Ask your superior assistance.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=adminlog_error") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Admin Log Failed</strong> Please check you data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=archive_user_error") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Removing amin user Failed</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=user_archiving_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Removing amin user Failed</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=update_password_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Updating password failed</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=password_should_have_8_character_and_above") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Password should have 8 character and above</strong> You can use 0-9 and a-z,A-Z character in any combination.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=user_status_change_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Failed to change Admin user status</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=error_self_status") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> You cannot change your own status</strong> Ask your superior assistance.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=login_details_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Updating user login details Failed!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=profile_details_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Updating user profile details Failed!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=deletion_of_consul_list_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Deletion of client consultation list Failed!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=deletion_of_consul_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Deletion of client consultation Failed!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=consultation_archived_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Client Consultation Failed to archive!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=er_archived_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Client Event Reservation Failed to archive!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=email_archived_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Client Email Failed to archive!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=client_not_exist") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> No Records Found!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=client_archived_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Client info Failed to archive!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=client_deletion_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Client info Failed to delete!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=client_email_deletion_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Client emailed Failed to delete!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=empty_fields") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Some Field are empty!</strong> Please check and fill up all fields before submitting.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=message_not_sent") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Message not sent!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=email_query_error") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Failed to save your email query!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=service_uniID_is_already_been_exist") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Services is already in the list!</strong> You cannot create services with the same uniID.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=ext_file_not_supported") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> File is not supported!</strong> Only jpeg, jpg, png and gif are file extension that can be uploaded and limit to 25mb.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=services_not_exist") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Service Not Found!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=sub_category_error") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Sub-Category status update failed!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=category_error") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Category status update failed!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=category_not_exist") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Category Not Found!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=category_uniID_is_already_been_exist") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Category is already in the list!</strong> You cannot create Category with the same uniID.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=sub_category_uniID_is_already_been_exist") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Sub-Category is already in the list!</strong> You cannot create Sub-Category with the same uniID.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=sub_category_is_not_exist") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Sub-Category Not Found!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=sub_category_archive_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Sub-Category Failed to move in archive!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=sub_category_update_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Sub-Category Failed to move in archive!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=category_archive_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Category Failed to move in archive!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=category_update_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Category Failed to move in archive!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=service_not_exist") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Service Not Found!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=service_archive_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Category Failed to move in archive!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=service_update_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Service Failed to move in archive!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=update_event_reservation_status_failedd") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Event Status Update Failed!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=event_reservation_reports_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Event Approve Failed!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=update_event_reservation_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Event Declined Failed!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=email_is_invalid") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Failed to Send mail!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=email_query_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Failed to Send mail!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=failed_to_insert_in calendar") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Failed Add the Event in the Calendar!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=event_update_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Failed to Update Event!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=please_re_enter_event_start_date") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Please Set Again the "Start Date!"</strong> you need to set again the start date of the event when editing.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=update_event_status_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Event Status Update Failed!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=image_update_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Event Image Update Failed!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=consultation_already_approved") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Consultation Request is Already Exist!</strong> this request is already in the Consultation Report list, Please check and verify.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=consultation_update_status_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Consultation Request Failed to Change the Status!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=consultation_reports_insertion_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Consultation Request Failed to move in the Consultation Report!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=client_deletion_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Failed to Delete Client all information!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=client_archived_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Failed to Delete Client information!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=client_not_exist") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Client Information is not on the list!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=client_email_deletion_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Failed to Delete Client information!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=email_archived_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Failed to Delete Client information!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=event_not_exist") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Event not on the List!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=event_archive_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Event Failed to move in Archive!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }else if(strpos($fullUrl, "error=event_delete_failed") == true ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i><strong> Event Failed to move in Archive!</strong> Please check your data field and databse attributes.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    

    else if(strpos($fullUrl, "success=new_admin_created_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> New Admin User added!</strong> Try new admin account using credential.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=activate_user_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Activate user successfully!</strong> Try admin account using credential.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=password_reset_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Password reset successfully!</strong> Try admin account using credential.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=archiving_user_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> You succesfully removing admin user account!</strong> Admin user is in the archive.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=update_password_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Password update successfully!</strong> Try admin account using credential.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=user_status_change_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> User status change successfully!</strong> You changes admin user status.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=user_update_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> User info updated successfully!</strong> You update admin user info.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=cancellation_success") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> You cancelled your activity!</strong> you are now redirection to this page.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=client_delete_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Client All Information is deleted successfully!</strong> you delete client all information and records.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=email_sent_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Message is sent!</strong> you successfully send message to the client/users.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=new_created_services_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> New Services added!</strong> you successfully create new services.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=services_update_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Service is Update!</strong> you successfully updated services.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=status_update_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Status is Update!</strong> you successfully updated status.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=service_image_update_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Service Image update!</strong> you successfully change image of service.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=new_services_category_upload") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> New Category added!</strong> you successfully create new category.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=category_update_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Category is Update!</strong> you successfully updated Category.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=new_services_sub_category_upload") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> New Sub-Category added!</strong> you successfully create new sub-category.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=sub_category_update_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Sub-Category is Update!</strong> you successfully updated Sub-Category.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=sub_cat_archive_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Sub-Category is move in the archive!</strong> you successfully move Sub-Category in the archive.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=category_archive_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Category is move in the archive!</strong> you successfully move Service Category in the archive.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=service_archive_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Service is move in the archive!</strong> you successfully move Service, Category, and Sub-Category in the archive.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=event_reservation_reports_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Event Reservation is Approve!</strong> you successfully approved event reservation.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=event_reservation_update_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Event Reservation is Decline!</strong> you successfully declined event reservation.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=new_event_created_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> New Event Successfully Created!</strong> you successfully create new event.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=event_updated_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Event Successfully Update!</strong> you successfully update the event.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=event_status_updated_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Event Status Successfully Update!</strong> you successfully update the event status.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=event_image_update_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Event Image update!</strong> you successfully change image of event.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=consultation_report_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> You Successfully Approve Consultation Request!</strong> The consultation request in now move in Consultation Report, Please check and verify.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=consultation_update_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Consultation Request Declined!</strong> You Declined Consultation Request.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=client_delete_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Client All Information is Successfully Deleted!</strong> You Delete Client All information.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else if(strpos($fullUrl, "success=event_delete_successfully") == true ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i><strong> Event is Successfully Deleted!</strong> You Delete event.   
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
?>