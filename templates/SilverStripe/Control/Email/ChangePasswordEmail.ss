<p><%t SilverStripe\\Control\\ChangePasswordEmail_ss.HELLO 'Hi' %> $FirstName,</p>

<p>
	<%t SilverStripe\\Control\\ChangePasswordEmail_ss.CHANGEPASSWORDTEXT1 'You changed your password for' is 'for a url' %> $AbsoluteBaseURL.<br />
	<%t SilverStripe\\Control\\ChangePasswordEmail_ss.CHANGEPASSWORDFOREMAIL2 'The password for account with email address {email} has been changed. If you did not change your password please change your password using the link below' email=$Email %><br />
	<a href="Security/changepassword"><%t SilverStripe\\Control\\ChangePasswordEmail_ss.CHANGEPASSWORDTEXT3 'Change password' %></a>
</p>
