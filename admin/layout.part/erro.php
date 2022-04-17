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
    
?>