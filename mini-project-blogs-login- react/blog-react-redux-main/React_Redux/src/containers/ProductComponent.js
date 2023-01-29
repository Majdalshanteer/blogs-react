import React from "react";
import { Link } from "react-router-dom";
import { Button } from "react-bootstrap";
import axios from "axios";
import { BiEdit } from "react-icons/bi";
import { MdAutoDelete } from "react-icons/md";

const ProductComponent = (props) => {
  //Delete
  const handleDel = (id) => {
    axios
      .delete(`http://localhost/ApiRedux/blogs.php/${id}/delete`)
      .then(function (response) {
        window.location.reload(false);
      });
  };
  if (props.search == "") {


    
    const renderList = props.currentBlogs.map((product) => {
      const { id, title, img, content } = product;

      return (
        <div className="col" key={id}>
       
         
            <div className="ui link cards">
              <div className="card">
                <div className="image">
                  <img src={img} alt={title} />
                </div>
                <div className="content">
                  <div className="header">{title}</div>
                  <div className="meta">{content}</div>
                </div>
                <hr/>
                <div style={{display:"flex" , justifyContent:"space-evenly"}}>
                {sessionStorage.getItem("role") === "admin" ? (
                 <button className="btn btn-warning" style={{width:"60px"}}> <Link to={`/product/${id}`}>
                    Edit
                    {/* <BiEdit/> */}
                  </Link></button>
                ) : null}
              
                     {sessionStorage.getItem("role") === "admin" ? (
                  <Button  onClick={() => handleDel(id)} variant="danger">
                    Delete
                    {/* <MdAutoDelete/> */}
                  </Button>
                ) : null}
              </div></div>
            </div>
          </div>
    
  
      );
    });
    return <>{renderList}</>;
  } else {
    const filteredData = props.all.filter((el) => {
      return el.title.toLowerCase().includes(props.search);
    });

    const renderList = filteredData.map((product) => {
      const { id, title, img, content } = product;
      return (
        <div className="col mb-5" key={id}>
          <div className="ui link cards">
            <div className="card">
              <div className="image">
                <img src={img} alt={title} />
              </div>
              <div className="content">
                <div className="header">{title}</div>
                <div className="meta">{content}</div>
              </div>
              <hr/>
              <div style={{display:"flex" , justifyContent:"space-evenly"}}>
            
              {sessionStorage.getItem("role") == "admin" ? (
                <button className="btn btn-warning" style={{width:"60px"}}><Link  to={`/product/${id}`}>
                  Edit
                </Link></button>
              ) : null}

{sessionStorage.getItem("role") == "admin" ? (
                <Button onClick={() => handleDel(id)} variant="danger">
                  Delete
                </Button>
              ) : null}
              </div>
            </div>
          </div>
        </div>
      );
    });
    return <>{renderList}</>;
  }
};

export default ProductComponent;
