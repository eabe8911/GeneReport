<from action={$FormAction} method="post" enctype="multipart/form-data">
    {Hiddenfield1}{Hiddenfield2}{Hiddenfield3}
    Select Excel file to upload:
    <input type="file" name="ExcelFile" id="ExcelFile">
    <input type="submit" value="Upload Excel File" name="submit">
    <p id="Message">
    <div class="alert alert-danger alert-container" id="alert" {$ShowErrorMessage}>
        <strong>
            <center>
                <h1>{$ErrorMessage}</h1>
            </center>
        </strong>
    </div>
    </p>

</form>