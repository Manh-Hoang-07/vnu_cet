<?php 
  
// Store a string into the variable which 
// need to be Encrypted 
$simple_string = "Welcome to GeeksforGeeks\n"; 
  
// Display the original string 
echo "Original String: " . $simple_string;
echo '<br>'; 
  
// Store the cipher method 
$ciphering = "AES-128-CTR"; 
  
// Use OpenSSl Encryption method 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 
  
// Non-NULL Initialization Vector for encryption 
$encryption_iv = 'q6adnR641xLYp9ufJh58Yw8Sridc7p2DyVWP0Wt5EeY='; 
  
// Store the encryption key 
$encryption_key = "GeeksforGeeks"; 
  
// Use openssl_encrypt() function to encrypt the data 
$encryption = openssl_encrypt($simple_string, $ciphering, 
            $encryption_key, $options, $encryption_iv); 
  
// Display the encrypted string 
echo "Encrypted String: " . $encryption . "\n"; 
echo '<br>';
  
// Non-NULL Initialization Vector for decryption 
$decryption_iv = 'q6adnR641xLYp9ufJh58Yw8Sridc7p2DyVWP0Wt5EeY='; 
  
// Store the decryption key 
$decryption_key = "GeeksforGeeks"; 
  
// Use openssl_decrypt() function to decrypt the data 
$decryption=openssl_decrypt ($encryption, $ciphering,  
        $decryption_key, $options, $decryption_iv); 
  
// Display the decrypted string 
echo "Decrypted String: " . $decryption; 
session_start();
  $username = $_SESSION['tennguoithi'];
	$password = $_SESSION['khoanguoithi'];
echo $username;
echo $password;
?>