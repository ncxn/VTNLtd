<?php
namespace Vtnltd\Plugin;
use Phalcon\Flash\Session as flash;
class MetroFlash extends Flash
{
     /**
     * Adds error message to stack
     * @param string $text
     * @return JS notify message
     */
    public function error($text)
    {
      echo "<script type='text/javascript'>";
      echo "$.Notify({
             caption: 'Error',
             content: '$text',
             type: 'alert',
             keepOpen: true,
             icon:\"<span class='mif-warning'></span>\"});";
      echo "</script>";
    }    

    /**
     * Adds notice message to stack
     * @param string $text
     * @return Flash
     */
    public function notice($text)
    {
      echo "<script type='text/javascript'>";
      echo "$.Notify({
             caption: 'Info:',
             content: '$text',
             type: 'Info',
             icon:\"<span class='mif-warning'></span>\"});";
      echo "</script>";
    }    

    /**
     * Adds success message to stack
     * @param string $text
     * @return Flash
     */
    public function success($text)
    {
      echo "<script type='text/javascript'>";
      echo "$.Notify({
             caption: 'Success:',
             content: '$text',
             type: 'success',
             icon:\"<span class='mif-warning'></span>\"});";
      echo "</script>";
    }

    /**
     * Adds warning message to stack
     * @param string $text
     * @return Flash
     */
    public function warning($text)
    {
     echo "<script type='text/javascript'>";
      echo "$.Notify({
             caption: 'Warning:',
             content: '$text',
             type: 'warning',
             icon:\"<span class='mif-warning'></span>\"});";
      echo "</script>";
    }
}