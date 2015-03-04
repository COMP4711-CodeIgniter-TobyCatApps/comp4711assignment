<div class="container">
  <h1>List of posts:</h1>
  <table class="table">
    <tr>
      <th></th>
      <th>ID</th>
      <th>userID</th>
      <th>uploaded</th>
      <th>price</th>
      <th>flags</th>
      <th>description</th>
      <th>categoryID</th>
      <th>title</th>
    </tr>

    {adlist}
    <tr>
      <td>{edit}</td>
      <td>{ID}</td>
      <td>{userID}</td>
      <td>{uploaded}</td>
      <td>{price}</td>
      <td>{flags}</td>
      <td>{description}</td>
      <td>{categoryID}</td>
      <td>{title}</td>
    </tr>
    {/adlist}
  </table>
</div>

<div class="container">
  <h1>List of users:</h1>
  <table class="table">
    <tr>
      <th></th>
      <th>ID</th>
      <th>type</th>
      <th>username</th>
      <th>email</th>
      <th>displayname</th>
    </tr>

    {userlist}
    <tr>
      <td>{edit}</td>
      <td>{ID}</td>
      <td>{type}</td>
      <td>{username}</td>
      <td>{email}</td>
      <td>{displayname}</td>
    </tr>
    {/userlist}
  </table>
</div>
