{{ content() }}


<h1 class="text-light">Your Profile Page</h1>
<hr class="thin">
{{ user.name }}
<br />
Group: {{ user.group.name }}
<br />
{{ profile.picture }}
{{ link_to("user/edit", "Edit your profile") }}
 
