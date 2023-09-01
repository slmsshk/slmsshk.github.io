class ParallaxEffect extends React.Component {
    handleMouseMove = (e) => {
      const el = document.getElementById("wrapper");
      const d = el.getBoundingClientRect();
      let x = e.clientX - (d.left + Math.floor(d.width / 2));
      let y = e.clientY - (d.top + Math.floor(d.height / 2));
      // Invert values
      x = x - x * 2;
      y = y - y * 2;
      document.documentElement.style.setProperty("--x", x / 2 + "px");
      document.documentElement.style.setProperty("--y", y / 2 + "px");
    };
  
    handleMouseLeave = () => {
      document.documentElement.style.setProperty("--x", 0);
      document.documentElement.style.setProperty("--y", 0);
    };
  
    render() {
      return (
        <div
          id="wrapper"
          onMouseMove={this.handleMouseMove}
          onMouseLeave={this.handleMouseLeave}
        >
          <img
            id="image"
            src="ml_background.jpg"
            alt="Background"
          />
        </div>
      );
    }
  }
  
  export default ParallaxEffect;
  