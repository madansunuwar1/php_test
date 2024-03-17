<p>Your verification status has been updated to: {{ $status }}</p>

@if ($email !== null)
    <p>Your email is: {{ $email }}</p>
@endif

@if ($password !== null)
    <p>Your new password is: {{ $password }}</p>
    <p>Please login to your account and change your password</p>
@endif

@if ($status === 'rejected')
    <p>We regret to inform you that your verification request has been rejected.</p>
    <!-- Add any additional information or instructions for rejected status here -->
@endif