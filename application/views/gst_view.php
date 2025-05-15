<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSTIN</title>
    <link rel="stylesheet" href="<?= base_url('assets/hmis/styles/styleGST.css') ?>">
</head>

<body>
    <h1>GSTIN Validator</h1>
    <form action="<?= site_url('GstValidation/insertGSTIN') ?>" method="POST">
        <label for="state">State Code</label>
        <select name="stateid" id="state">
            <option value="" disabled selected>Select State</option>
            <option value="01">[01] JAMMU AND KASHMIR</option>
            <option value="02">[02] HIMACHAL PRADESH</option>
            <option value="03">[03] PUNJAB</option>
            <option value="04">[04] CHANDIGARH</option>
            <option value="05">[05] UTTARAKHAND</option>
            <option value="06">[06] HARYANA</option>
            <option value="07">[07] DELHI</option>
            <option value="08">[08] RAJASTHAN</option>
            <option value="09">[09] UTTAR PRADESH</option>
            <option value="10">[10] BIHAR</option>
            <option value="11">[11] SIKKIM</option>
            <option value="12">[12] ARUNACHAL PRADESH</option>
            <option value="13">[13] NAGALAND</option>
            <option value="14">[14] MANIPUR</option>
            <option value="15">[15] MIZORAM</option>
            <option value="16">[16] TRIPURA</option>
            <option value="17">[17] MEGHALAYA</option>
            <option value="18">[18] ASSAM</option>
            <option value="19">[19] WEST BENGAL</option>
            <option value="20">[20] JHARKHAND</option>
            <option value="21">[21] ODISHA</option>
            <option value="22">[22] CHATTISGARH</option>
            <option value="23">[23] MADHYA PRADESH</option>
            <option value="24">[24] GUJARAT</option>
            <option value="25">[25] DAMAN AND DIU</option>
            <option value="26">[26] DADRA AND NAGAR HAVELI</option>
            <option value="27">[27] MAHARASHTRA</option>
            <option value="28">[28] ANDHRA PRADESH (BEFORE DIVISION)</option>
            <option value="29">[29] KARNATAKA</option>
            <option value="30">[30] GOA</option>
            <option value="31">[31] LAKSHWADEEP</option>
            <option value="32">[32] KERALA</option>
            <option value="33">[33] TAMIL NADU</option>
            <option value="34">[34] PUDUCHERRY</option>
            <option value="35">[35] ANDAMAN AND NICOBAR ISLANDS</option>
            <option value="36">[36] TELANGANA</option>
            <option value="37">[37] ANDHRA PRADESH (NEW)</option>

        </select>
        <br><br>
        <label for="pan">PAN no:</label>
        <input type="text" id="pan" name="pannum" maxlength="10">
        <br><br>


        <input style="width: 3em;" type="text" id="char13" name="ch13" placeholder="13th character" value=""
            maxlength="1">
        <input style="width: 3em;" type="text" id="charZ" name="chZ" value="Z" required readonly>
        <input style="width: 3em;" type="text" id="char15" name="ch15" placeholder="15th character" value=""
            maxlength="1">
        <br><br>

        <label for="gstin">GSTIN</label>
        <input type="text" id="gstin" name="gstinName" value="" maxlength="15"
            oninput="this.value = this.value.toUpperCase();" required>
        <label id="gstinLabel"></label>

        <input type="button" onclick="clearForm()" value="Clear">
        <br><br>

        <input type="submit" name="saveGSTIN" value="Save">
        <br><br>

        <input type="button" onclick="window.location.href='<?= site_url('GstValidation/displayGSTIN_List') ?>'" value="List GSTINs">
       
        <!-- <a href="<?= site_url('GstValidation/displayGSTIN_List') ?>" class="btn btn-primary">
            List GSTINs
        </a> -->


        

        <script>
            let stateSelect = document.getElementById("state");
            let panInput = document.getElementById("pan");
            let character13 = document.getElementById("char13");
            let character14 = document.getElementById("charZ");
            let character15 = document.getElementById("char15");
            let gstInput = document.getElementById("gstin");

            let gstinCheckLabel = document.getElementById("gstinLabel");

            function generateGSTIN() {

                gstInput.value = stateSelect.value.padStart(2, '0') + panInput.value.toUpperCase() + character13.value.toUpperCase() + character14.value + character15.value.toUpperCase();

                if ((stateSelect.value + panInput.value).length === 12 && character13.value && character15.value) {

                    let isValid = checksum(gstInput.value);
                    console.log("Valid GSTIN? ", isValid);
                    if (isValid === true) {
                        // alert("Valid GSTIN? \n" + isValid + "\nVALID GSTIN");
                        gstinCheckLabel.textContent = "✅ Valid GSTIN";
                    }
                    else {
                        // alert("Valid GSTIN? \n" + isValid + "\nINVALID GSTIN");
                        gstinCheckLabel.textContent = "❌ Invalid GSTIN";
                    }

                } else {
                    gstInput.value = "";
                }

            }

            function fillFromGSTIN() {

                stateSelect.value = gstInput.value.substring(0, 2);
                panInput.value = gstInput.value.substring(2, 12);
                character13.value = gstInput.value.substring(12, 13);
                character15.value = gstInput.value.substring(14, 15);

                let isValid = checksum(gstInput.value);
                console.log("Valid GSTIN? ", isValid);
                if (isValid === true) {
                    // alert("Valid GSTIN? \n" + isValid + "\nVALID GSTIN");
                    gstinCheckLabel.textContent = "✅ Valid GSTIN";
                }
                else {
                    // alert("Valid GSTIN? \n" + isValid + "\nINVALID GSTIN");
                    gstinCheckLabel.textContent = "❌ Invalid GSTIN";
                }

            }

            stateSelect.addEventListener('change', generateGSTIN);
            panInput.addEventListener('input', generateGSTIN);
            character13.addEventListener('input', generateGSTIN);
            character15.addEventListener('input', generateGSTIN);
            gstInput.addEventListener('input', fillFromGSTIN);

            //from stackoverflow: https://stackoverflow.com/questions/2916539/concatenate-two-fields-to-display-in-dropdown-list 
            function checksum(g) {
                let regTest = /\d{2}[A-Z]{5}\d{4}[A-Z]{1}[A-Z\d]{1}[Z]{1}[A-Z\d]{1}/.test(g)
                if (regTest) {
                    let a = 65, b = 55, c = 36;
                    return Array['from'](g).reduce((i, j, k, g) => {
                        p = (p = (j.charCodeAt(0) < a ? parseInt(j) : j.charCodeAt(0) - b) * (k % 2 + 1)) > c ? 1 + (p - c) : p;
                        return k < 14 ? i + p : j == ((c = (c - (i % c))) < 10 ? c : String.fromCharCode(c + b));
                    }, 0);
                }
                return regTest
            }

        </script>

        <script>
            function clearForm() {
                stateSelect.value = "";
                panInput.value = "";
                character13.value = "";
                character15.value = "";
                gstInput.value = "";
                gstinCheckLabel.textContent = "";
            }
        </script>
    </form>
</body>

</html>