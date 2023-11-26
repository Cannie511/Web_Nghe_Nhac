class CreateNew extends React.Component {
  handleClick = () =>{ alert('click btn!')};
  render() {
    return (
      <div className="render">
        <form>
        <input type="text" placeholder="Tên đăng nhập" />
        <br />
        <input type="password" placeholder="Mật khẩu" />
        <br />
        <input type="submit" value="Đăng nhập" />
        <br/>
        <div className = 'Del' id = 'del' onclick = 'handleClick'>Xóa</div>
        </form>
      </div>
    );
  }
}
