@extends('layouts.master')
@section('content')
<style>
    
      
       
        
        
        form {
            margin-top: 20px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
        }
        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form button {
            background-color: #77aaff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
        form button:hover {
            background-color: #0056b3;
        }
</style>

        <p>If you have any questions or comments, please don't hesitate to contact us. We're always here to help!</p>
        
        <p>Email: support@onlineshoeshop.com</p>
        <p>Phone: 123-456-7890</p>

        <!-- Contact Form -->
        <form action="submit_contact_form.php" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            
            <button type="submit">Send Message</button>
        </form>
    </div>
@endsection