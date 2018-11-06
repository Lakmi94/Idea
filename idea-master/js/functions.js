/**
* Checks if a password is valid. A valid password will consist of 8 characters
* in length, have at least one letter that is differentiated in case, and one
* number.
*/
function check_passwd(password)
{
  // password.match(/\d+/g) -- numbers match
  if ( (password.match(/\d+/g)) &&
      (password.toUpperCase() != password) &&
      (password.toLowerCase() != password) &&
      (password.length >= 8) &&
      (password.length <= 30))
  {
    return true;
  } else {
    return false;
  }
}
