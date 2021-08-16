import java.sql.*;
public class DbConnection {
 Connection conn=null;  
  
 public static Connection ConnectDb()
 {
     try
     {
         Class.forName("com.mysql.jdbc.Driver");
         String db_url="jdbc:mysql://localhost:3306/keepsafebank";
         Connection conn=DriverManager.getConnection(db_url,"root","");
         System.out.println(conn);
         return conn;
         
     }
     catch(ClassNotFoundException | SQLException e)
     {
         System.out.println(e);
         return null;
     }
 }
}