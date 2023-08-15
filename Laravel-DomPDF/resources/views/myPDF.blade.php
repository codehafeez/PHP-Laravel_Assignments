<! DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Laravel Generate PDF</title>
<style>
.hc{
  text-align:center;
  color:red;
}
table, td, th {
  border: 1px solid;
  padding:10px;
}
table {
  width: 100%;
  border-collapse: collapse;
}
</style>
</head>
<body>

    <h2 class="hc">{{ $webName }}</h2>
    <p>Laravel is a free and open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony.</p>
    <img src="{{$imagePath}}"> 
    
    <table>
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>

    
</body>
</html>