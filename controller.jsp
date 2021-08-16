<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<jsp:useBean id="pDAO" class="requirements.DbConnection"/>
<%@page import="java.sql.PreparedStatement"%>
<% 
   Connection conn = null;
    ResultSet rs = null;
    PreparedStatement pst = null;
    conn = requirements.DbConnection.ConnectDb();
    try
    {
String name=request.getParameter("username");
String email=request.getParameter("email");
int amount=request.getParameter("amount")
pst=conn.prepareStatement("INSERT INTO createuser(id,name,email,amount)VALUES('"+name+"','"+email+"','"+amount+"')");
rs=pst.executeQuery(); 
     }catch(Exception e)
    {
      out.print(e);
    }
%>


