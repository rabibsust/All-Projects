package minitennis;

import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.Rectangle;
import java.awt.geom.Rectangle2D;

public class Ballsprite {
    private static final int DIAMETER = 15;
    int x=0;
    int y=0;
    int xa = 1;
    int ya = 1;
    private Minitennis tennis;

    void moveball() {
		if (x + xa < 0)
			xa = tennis.speed;
		if (x + xa > tennis.getWidth() - DIAMETER)
			xa = -tennis.speed;
		if (y + ya < 0)
			ya = tennis.speed;
		if (y + ya > tennis.getHeight() - DIAMETER)
			tennis.gameover();
		if (Collision()){
			ya = -tennis.speed;
			y = tennis.racquet.getTopY() - DIAMETER;
			tennis.speed++;
		}
                x = x + xa;
		y = y + ya;
	}

    public Ballsprite(Minitennis tennis) {
       this.tennis=tennis;
    }
    

    private boolean Collision(){
        return tennis.racquet.getBounds().intersects(getBounds());
    }
        public void paint(Graphics2D g){
            g.setColor(Color.red);
            g.fillOval(x, y, DIAMETER, DIAMETER);
    }

    private Rectangle getBounds() {
        return new Rectangle(x, y, DIAMETER, DIAMETER);
        
    }
}
