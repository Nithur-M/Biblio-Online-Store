<?php
include "database-config.php";
function InsertIntoDB(&$formvars)
{
    $confirmcode = $this->MakeConfirmationMd5($formvars['email']);

    $insert_query = 'insert into '.$this->users.'(
            email,
            password,
            )
            values
            (
            "' . $this->SanitizeForSQL($formvars['email']) . '",
            "' . md5($formvars['password']) . '",
            )';      
    if(!mysql_query( $insert_query ,$this->connection))
    {
        $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
        return false;
    }        
    return true;
}
?>
