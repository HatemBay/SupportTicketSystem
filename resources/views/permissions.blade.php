@hasrole('admin')
  <p>You have been assigned the [admin] role.</p>
@else
  <p>You do NOT have the admin role.</p>
@endhasrole

@can('edit departments')
  <p>You have permission to [edit departments].</p>
@else
  <p>Sorry, you may NOT edit departments.</p>
@endcan
