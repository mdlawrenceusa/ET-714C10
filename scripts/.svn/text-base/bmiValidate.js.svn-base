//bmiValidate.js

function validateInput()
{
    var bmiFormObj = document.getElementById("bmiForm")
    var hUnitIndex = bmiFormObj.heightUnit.selectedIndex
    var hUnit = bmiFormObj.heightUnit.options[hUnitIndex].text;
    var wUnitIndex = bmiFormObj.weightUnit.selectedIndex;
    var wUnit = bmiFormObj.weightUnit.options[wUnitIndex].text;
    var height = bmiFormObj.height.value;
    var weight = bmiFormObj.weight.value;
    var email = bmiFormObj.email.value;
    var heightOK, weightOK, emailOK;

    if (hUnit == "inches")
        heightOK = validateInches(height);
    else
        heightOK = validateCentimetres(height);
    
    if (wUnit == "pounds")
        weightOK = validatePounds(weight);
    else
        weightOK = validateKilograms(weight);
    
    if (bmiFormObj.wantMail.checked)
        emailOK = validateEmail(email);
    else
        emailOK = true;
    
    return heightOK && weightOK && emailOK;
}

function validateInches(height)
{
    if (isNaN(height))
    {
        alert("Error: Please input a number for height.")
        return false;
    }
    
    if (height < 0 || height > 100)
    {
        alert("Error: Height must be in the range 0-100 inches.")
        return false;
    }
    
    return true;
}

function validateCentimetres(height)
{
    if (isNaN(height))
    {
      alert("Error: Please input a number for height.")
      return false;
    }
    
    if (height < 0 || height > 300)
    {
      alert("Error: Height must be in the range 0-300 centimeters.")
      return false;
    }
    
    return true;
}

function validatePounds(weight)
{
    if (isNaN(weight))
    {
        alert("Error: Please input a number for weight.")
        return false;
    }
    
    if (weight < 0 || weight > 1000)
    {
        alert("Error: Weight must be in the range 0-1000 pounds.")
        return false;
    }
    return true;
}

function validateKilograms(weight)
{
    if (isNaN(weight))
    {
        alert("Error: Please input a number for weight.")
        return false;
    }

    if (weight <= 0 || weight > 500)
    {
      alert("Error: Weight must be in the range 0-500 kilograms.")
      return false;
    }
    return true;
}

function validateEmail(address)
{
    var p = address.search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})$/);
    if (p == 0)
        return true;
    else
    {
        alert("Error: Invalid e-mail address.")
        return false;
    }
}
