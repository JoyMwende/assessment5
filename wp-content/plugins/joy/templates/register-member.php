<div style="width:50%; display:flex; flex-direction:column; justify-content:center; align-items:center; margin-left: 20em; margin-top:1em;">
    <form method="post" style="width:30vw; box-shadow: 2px 2px 2px 2px grey;padding: 2em 3em; line-height: 2em; border-radius: 5px; background-color:#FFFFFF">

        <h1 style="text-align:center;">Add A Product</h1>
        <div>
            <label>Full Name:</label><br>
            <input type="text" style="width:100%;" placeholder="Enter product name" name="full_name" required>
        </div>
        <div>
            <label>Phone Number: </label><br>
            <input type="text" style="width:100%;" placeholder="Enter product brand" name="phone_number" required><br>

        </div>
        <div>
            <label>Email: </label><br>
            <input type="text" style="width:100%;" placeholder="Enter product description" name="email" required><br>

        </div>
        <div>
            <label>Programming Language:</label><br>
            <select name="programming_languange" id="" style="width:100%" required>
                <option value="Select Category" selected disabled hidden>Select Category</option>
                <option value="Angular">Angular</option>
                <option value="WordPress">WordPress</option>

            </select>
        </div>

        <div>
            <label>Cohort Number:</label><br>
            <input type="number" style="width:100%;" placeholder="Enter initial price" name="cohort_number" required>
        </div>


        <button type="submit" style="width:100%; background-color:#0071DC; color:white; padding:7px; border-radius: 5px; font-size: 14px; border: none; margin-top:10px;" name="submitbtn">Submit</button>
    </form>
</div>