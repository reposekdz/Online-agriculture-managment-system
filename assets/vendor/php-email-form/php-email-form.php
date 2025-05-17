<?php
/**
 * PHP Email Form (Alternative Example)
 *
 * Please note that this is an illustrative example and may not include all the
 * advanced features or the exact internal structure of the commercial BootstrapMade
 * library (like advanced spam protection, file attachments out-of-the-box
 * without further coding, or direct SMTP integration without external libraries).
 *
 * For advanced features like robust SMTP, file attachments, and advanced
 * spam protection, consider using dedicated libraries like PHPMailer or
 * Symfony Mailer, or purchasing the pro version of templates that include
 * the original library.
 */

class PHP_Email_Form {

  /**
   * Recipient email address.
   * @var string
   */
  public $to = '';

  /**
   * Sender's name.
   * @var string
   */
  public $from_name = '';

  /**
   * Sender's email address.
   * @var string
   */
  public $from_email = '';

  /**
   * Email subject.
   * @var string
   */
  public $subject = '';

  /**
   * Array of message lines or parts.
   * Each element is an array: ['content' => '...', 'label' => '...', 'min_chars' => ..., 'is_html' => ...]
   * @var array
   */
  private $messages = [];

  /**
   * Whether the request is AJAX. If true, script will output 'OK' or error message.
   * @var bool
   */
  public $ajax = false;

  /**
   * SMTP settings.
   * Example: ['host' => 'smtp.example.com', 'username' => 'user', 'password' => 'pass', 'port' => '587', 'encryption' => 'tls']
   * Note: Actual SMTP sending is not implemented in this basic example.
   * You would need a library like PHPMailer for this.
   * @var array|null
   */
  public $smtp = null;

  /**
   * CC email addresses.
   * @var array
   */
  public $cc = [];

  /**
   * BCC email addresses.
   * @var array
   */
  public $bcc = [];
  
  /**
   * Attachments. Each element is an array: ['path' => '/path/to/file', 'name' => 'filename.ext']
   * Note: Actual attachment handling is not implemented in this basic example.
   * @var array
   */
  public $attachments = [];


  /**
   * Default error message.
   * @var string
   */
  private $error_message = 'An error occurred and your message could not be sent.';
  
  /**
   * Default success message.
   * @var string
   */
  private $success_message = 'Your message has been sent successfully!';

  /**
   * Character set for the email.
   * @var string
   */
  public $charset = 'UTF-8';

  /**
   * Constructor
   */
  public function __construct() {
    // Basic initialization
    if (isset($_SERVER['SERVER_NAME'])) {
        $this->from_name = $_SERVER['SERVER_NAME']; // Default from name
        $this->from_email = 'form@' . $_SERVER['SERVER_NAME']; // Default from email
    } else {
        // Fallback for CLI or environments where SERVER_NAME is not set
        $this->from_name = 'PHP Email Form';
        $this->from_email = 'noreply@example.com';
    }
  }

  /**
   * Add a message part to the email body.
   *
   * @param string $content The content of this message part.
   * @param string $label Optional label for this message part (e.g., "Name:").
   * @param int $min_chars Optional minimum character length for this content.
   * @param bool $is_html Optional, set to true if content is HTML. Defaults to false.
   * @return bool True if validation passes, false otherwise.
   */
  public function add_message($content, $label = '', $min_chars = 0, $is_html = false) {
    $content = trim($content);
    if ($min_chars > 0 && mb_strlen($content, $this->charset) < $min_chars) {
      $this->error_message = "The '" . ($label ?: 'field') . "' must be at least $min_chars characters long.";
      return false; 
    }
    $this->messages[] = [
      'content'   => $content,
      'label'     => $label,
      'min_chars' => $min_chars,
      'is_html'   => $is_html
    ];
    return true;
  }
  
  /**
   * Add a CC recipient.
   * @param string $email The email address to CC.
   */
  public function add_cc($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->cc[] = $email;
    }
  }

  /**
   * Add a BCC recipient.
   * @param string $email The email address to BCC.
   */
  public function add_bcc($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->bcc[] = $email;
    }
  }
  
  /**
   * Add an attachment.
   * Note: This basic example doesn't implement the file reading and MIME encoding for mail() function well.
   * For actual attachments, use a library like PHPMailer.
   * @param string $path Path to the file.
   * @param string $name Optional name for the attachment.
   */
  public function add_attachment($path, $name = '') {
      if (file_exists($path)) {
          $this->attachments[] = ['path' => $path, 'name' => $name ?: basename($path)];
      } else {
          // Optionally log an error or notify if attachment file not found
          // error_log("Attachment file not found: " . $path);
      }
  }


  /**
   * Validates the essential email data.
   * @return bool True if valid, false otherwise.
   */
  private function validate_data() {
    if (empty($this->to)) {
      $this->error_message = 'Recipient email address (to) is not set.';
      return false;
    }
    if (!filter_var($this->to, FILTER_VALIDATE_EMAIL)) {
      $this->error_message = 'Recipient email address (to) is invalid: ' . htmlspecialchars($this->to);
      return false;
    }
    if (empty($this->from_name)) {
      $this->error_message = 'Sender name (from_name) is not set.';
      return false;
    }
    if (empty($this->from_email)) {
      $this->error_message = 'Sender email (from_email) is not set.';
      return false;
    }
    if (!filter_var($this->from_email, FILTER_VALIDATE_EMAIL)) {
      $this->error_message = 'Sender email (from_email) is invalid: ' . htmlspecialchars($this->from_email);
      return false;
    }
    if (empty($this->subject)) {
      $this->error_message = 'Email subject is not set.';
      return false;
    }
    if (empty($this->messages)) {
      $this->error_message = 'Email message content is empty.';
      return false;
    }
    // Re-check min_chars validation for all messages
    foreach($this->messages as $msg_part) {
        if ($msg_part['min_chars'] > 0 && mb_strlen(trim($msg_part['content']), $this->charset) < $msg_part['min_chars']) {
            $this->error_message = "The '" . htmlspecialchars($msg_part['label'] ?: 'field') . "' must be at least {$msg_part['min_chars']} characters long.";
            return false;
        }
    }

    return true;
  }

  /**
   * Builds the email body.
   * Determines if the email should be HTML or plain text based on messages.
   * @return string The email body.
   */
  private function build_message_body() {
    $body_html = "";
    $body_plain = "";
    $is_html_email = false;

    foreach ($this->messages as $message_part) {
      if ($message_part['is_html']) {
        $is_html_email = true; // If any part is HTML, the whole email is treated as HTML
      }
    }

    foreach ($this->messages as $message_part) {
      $content_plain = $message_part['content']; // Original content for plain text
      $content_html = $message_part['is_html'] ? $message_part['content'] : nl2br(htmlspecialchars($message_part['content'], ENT_QUOTES, $this->charset));
      $label_plain = $message_part['label'];
      $label_html = htmlspecialchars($message_part['label'], ENT_QUOTES, $this->charset);

      // Plain text part
      if ($label_plain) {
        $body_plain .= $label_plain . ": ";
      }
      $body_plain .= $content_plain . "\n\n";

      // HTML part
      if ($label_html) {
        $body_html .= "<p><strong>" . $label_html . ":</strong> " . $content_html . "</p>\n";
      } else {
        $body_html .= "<p>" . $content_html . "</p>\n";
      }
    }

    if ($is_html_email) {
      // This is a simplified HTML body. For multipart/alternative, PHPMailer is better.
      return "<html><head><meta charset=\"{$this->charset}\"></head><body>{$body_html}</body></html>";
    }
    return $body_plain;
  }

  /**
   * Builds the email headers.
   * @return string The email headers.
   */
  private function build_headers() {
    $headers = [];
    // Sanitize from_name and from_email before using in header
    $sane_from_name = $this->sanitize_header_string($this->from_name, true);
    $sane_from_email = $this->sanitize_header_string($this->from_email);

    $headers[] = "From: " . $sane_from_name . " <" . $sane_from_email . ">";
    $headers[] = "Reply-To: <" . $sane_from_email . ">"; // Often, reply-to is the form submitter's email
    $headers[] = "MIME-Version: 1.0";

    $is_html_email = false;
    foreach ($this->messages as $message_part) {
      if ($message_part['is_html']) {
        $is_html_email = true;
        break;
      }
    }
    
    if (!empty($this->attachments)) {
        // If there are attachments, Content-Type will be multipart/mixed
        // and set later when constructing the full message with attachments.
        // For now, we don't set a specific content type here for the mail() function,
        // as the body itself will be constructed as multipart.
    } elseif ($is_html_email) {
        $headers[] = "Content-Type: text/html; charset=" . $this->charset;
    } else {
        $headers[] = "Content-Type: text/plain; charset=" . $this->charset;
    }

    if (!empty($this->cc)) {
        $cc_emails = array_map([$this, 'sanitize_header_string'], $this->cc);
        $headers[] = "Cc: " . implode(', ', $cc_emails);
    }
    if (!empty($this->bcc)) {
        $bcc_emails = array_map([$this, 'sanitize_header_string'], $this->bcc);
        $headers[] = "Bcc: " . implode(', ', $bcc_emails);
    }
    
    $headers[] = "X-Mailer: PHP/" . phpversion();

    return implode("\r\n", $headers);
  }

  /**
   * Sanitizes a string to be used in email headers to prevent header injection.
   * @param string $string The string to sanitize.
   * @param bool $is_name If true, allows more characters typical for names.
   * @return string The sanitized string.
   */
  private function sanitize_header_string($string, $is_name = false) {
    $string = trim($string);
    // Remove any CR or LF characters to prevent header injection
    $string = str_replace(["\r", "\n"], '', $string);
    if (!$is_name) {
        // For email addresses or simple header values, filter more strictly
        $string = filter_var($string, FILTER_SANITIZE_EMAIL); // Basic sanitization for email-like strings
    } else {
        // For names, allow a wider range of characters but still remove problematic ones
        // This is a basic sanitization; more complex name validation might be needed
        $string = filter_var($string, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
    }
    return $string;
  }

  /**
   * Sends the email.
   *
   * @return string 'OK' on success, or an error message on failure.
   */
  public function send() {
    if (!$this->validate_data()) {
      return $this->ajax ? $this->error_message : $this->error_message; // Return specific error from validation
    }

    // SMTP Sending (using PHPMailer example - requires PHPMailer library)
    if (is_array($this->smtp) && !empty($this->smtp['host'])) {
        /*
        // Ensure PHPMailer is loaded - typically via Composer's autoload
        // require 'path/to/vendor/autoload.php'; 
        // or manually:
        // require 'path/to/PHPMailer/src/Exception.php';
        // require 'path/to/PHPMailer/src/PHPMailer.php';
        // require 'path/to/PHPMailer/src/SMTP.php';

        // $mail = new PHPMailer\PHPMailer\PHPMailer(true); // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = $this->smtp['host'];
            $mail->SMTPAuth   = isset($this->smtp['username']) && isset($this->smtp['password']); // SMTPAuth if user/pass provided
            $mail->Username   = $this->smtp['username'] ?? '';
            $mail->Password   = $this->smtp['password'] ?? '';
            $mail->SMTPSecure = $this->smtp['encryption'] ?? PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = $this->smtp['port'] ?? 587;
            $mail->CharSet    = $this->charset;

            //Recipients
            $mail->setFrom($this->from_email, $this->from_name);
            $mail->addAddress($this->to); // Add a recipient

            // ReplyTo - set to the form submitter's email
            if (filter_var($this->from_email, FILTER_VALIDATE_EMAIL)) {
                 $mail->addReplyTo($this->from_email, $this->from_name);
            }

            // CC and BCC
            foreach($this->cc as $cc_email) { if(filter_var($cc_email, FILTER_VALIDATE_EMAIL)) $mail->addCC($cc_email); }
            foreach($this->bcc as $bcc_email) { if(filter_var($bcc_email, FILTER_VALIDATE_EMAIL)) $mail->addBCC($bcc_email); }

            // Attachments
            foreach($this->attachments as $attachment) {
                if (file_exists($attachment['path'])) {
                    $mail->addAttachment($attachment['path'], $attachment['name']);
                }
            }

            // Content
            $is_html_email = false;
            $html_body = "";
            $plain_body = "";

            foreach ($this->messages as $message_part) {
                if ($message_part['is_html']) $is_html_email = true;
                
                $label_plain = $message_part['label'];
                $content_plain = $message_part['content'];
                if ($label_plain) $plain_body .= $label_plain . ": ";
                $plain_body .= $content_plain . "\n\n";

                $label_html = htmlspecialchars($message_part['label'], ENT_QUOTES, $this->charset);
                $content_html = $message_part['is_html'] ? $message_part['content'] : nl2br(htmlspecialchars($message_part['content'], ENT_QUOTES, $this->charset));
                if ($label_html) $html_body .= "<p><strong>" . $label_html . ":</strong> " . $content_html . "</p>\n";
                else $html_body .= "<p>" . $content_html . "</p>\n";
            }
            
            $mail->isHTML($is_html_email); // Set email format to HTML if any part is HTML
            $mail->Subject = $this->subject;

            if ($is_html_email) {
                $mail->Body    = "<html><head><meta charset=\"{$this->charset}\"></head><body>{$html_body}</body></html>";
                $mail->AltBody = $plain_body; // Plain text version for non-HTML mail clients
            } else {
                $mail->Body    = $plain_body;
            }

            $mail->send();
            return $this->ajax ? 'OK' : $this->success_message;

        } catch (PHPMailer\PHPMailer\Exception $e) {
            $this->error_message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            // error_log("PHPMailer Error: " . $mail->ErrorInfo . " (From: {$this->from_email}, To: {$this->to})");
            return $this->ajax ? $this->error_message : $this->error_message;
        }
        */
      $this->error_message = 'SMTP sending is configured but the PHPMailer integration is commented out in this script. Please uncomment and configure it or use PHP mail().';
      // error_log($this->error_message);
      return $this->ajax ? $this->error_message : $this->error_message;
    }

    // Fallback to PHP mail() function
    $to_email = $this->to;
    $email_subject = $this->subject;
    $email_body_content = $this->build_message_body(); // This will be plain or HTML based on messages
    $email_headers_array = $this->build_headers(); // This returns an array of headers

    $final_email_body = $email_body_content;
    
    // Handling attachments with PHP mail() - This is complex and less reliable than PHPMailer
    if (!empty($this->attachments)) {
        $boundary = "PHP-mixed-" . md5(time() . uniqid());
        $header_boundary_line = "Content-Type: multipart/mixed; boundary=\"{$boundary}\"";
        
        // Remove existing Content-Type header and add the new multipart one
        $temp_headers = [];
        foreach(explode("\r\n", $email_headers_array) as $header_line) {
            if (stripos($header_line, 'Content-Type:') === false) {
                $temp_headers[] = $header_line;
            }
        }
        $temp_headers[] = $header_boundary_line;
        $email_headers_array = implode("\r\n", $temp_headers);

        // Determine if the main message part is HTML or plain
        $is_html_main_message = false;
        foreach ($this->messages as $message_part) { if ($message_part['is_html']) { $is_html_main_message = true; break; } }

        $multipart_body = "--{$boundary}\r\n";
        if ($is_html_main_message) {
            $multipart_body .= "Content-Type: text/html; charset=\"{$this->charset}\"\r\n";
        } else {
            $multipart_body .= "Content-Type: text/plain; charset=\"{$this->charset}\"\r\n";
        }
        $multipart_body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $multipart_body .= $email_body_content . "\r\n\r\n";

        foreach ($this->attachments as $attachment) {
            if (file_exists($attachment['path']) && is_readable($attachment['path'])) {
                $file_content = file_get_contents($attachment['path']);
                if ($file_content === false) continue; // Skip if can't read file

                $file_content_encoded = chunk_split(base64_encode($file_content));
                $file_name = $this->sanitize_header_string($attachment['name'] ?: basename($attachment['path']), true);
                
                // Try to get MIME type, fallback if finfo is not available
                $file_type = 'application/octet-stream'; // Default MIME type
                if (function_exists('finfo_open')) {
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $file_type = finfo_file($finfo, $attachment['path']);
                    finfo_close($finfo);
                } elseif (function_exists('mime_content_type')) {
                    $file_type = mime_content_type($attachment['path']);
                }


                $multipart_body .= "--{$boundary}\r\n";
                $multipart_body .= "Content-Type: {$file_type}; name=\"{$file_name}\"\r\n";
                $multipart_body .= "Content-Transfer-Encoding: base64\r\n";
                $multipart_body .= "Content-Disposition: attachment; filename=\"{$file_name}\"\r\n\r\n";
                $multipart_body .= $file_content_encoded . "\r\n\r\n";
            }
        }
        $multipart_body .= "--{$boundary}--";
        $final_email_body = $multipart_body;
    }


    if (mail($to_email, $email_subject, $final_email_body, $email_headers_array)) {
      return $this->ajax ? 'OK' : $this->success_message;
    } else {
      // error_log("PHP mail() failed. To: {$to_email}, Subject: {$email_subject}, From: {$this->from_email}");
      // You might want to check PHP's error log for more details on why mail() failed.
      return $this->ajax ? $this->error_message : $this->error_message;
    }
  }
}
?>
