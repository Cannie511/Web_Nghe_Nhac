class Playlists extends React.Component {
  render() {
    return (
      <div>
        <div className="title_pl">
          <h1>DANH SÁCH CỦA TÔI</h1>
        </div>
        <div id="popular" className="list_item">
          {/*?php loadPlaylist($pathPL, 10) ?*/}
        </div>
        <br />
        <div className="title_pl">
          <h1>GẦN ĐÂY</h1>
        </div>
        <div id="theme" className="list_item">
          {/*?php loadPlaylist($pathPL, 3) ?*/}
        </div>
        <br />
        <div className="title_pl">
          <h1>GỢI Ý</h1>
        </div>
        <div id="hot_album" className="list_item">
          {/*?php loadPlaylist($pathPL, 5) ?*/}
        </div>
        <br />
      </div>
    );
  }
}
