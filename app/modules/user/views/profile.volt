{{ content() }}


<h1 class="text-light">Your Profile Page</h1>
<hr class="thin">
{{ user.name }}
{{ user.group.name }}
{{ user.id }}
{{ link_to("user/edit", "Edit your profile") }}
 
