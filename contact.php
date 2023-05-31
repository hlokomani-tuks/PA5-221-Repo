<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - Sauvignon Syndicate</title>
</head>
<body>
    <h1>Contact Us</h1>

    <p>Thank you for your interest in Sauvignon Syndicate. We're here to assist you with any questions, feedback, or inquiries you may have. Please use the contact form below to get in touch with us:</p>

    <form action="process_contact.php" method="POST">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="5" cols="30" required></textarea><br>

        <input type="submit" value="Send Message">
    </form>

    <p>You can also reach us via email at <a href="mailto:info@sauvignonsyndicate.com">info@sauvignonsyndicate.com</a> or by phone at <strong>(123) 456-7890</strong>.</p>

    <p>We look forward to hearing from you and will get back to you as soon as possible!</p>
</body>
</html>