package minitennis;


import java.awt.Graphics2D;
import java.awt.Rectangle;
import java.awt.event.KeyEvent;

public class Racquet {

   // private static final int Y = 450;
    private static final int WIDTH = 60;
    private static final int HEIGHT = 10; 
    int x = 0;
    int xa = 0;
    int y = 450;
    int ya = 0;
    private Minitennis tennis;

    public Racquet(Minitennis tennis) {
	this.tennis= tennis;
    }
    public void moveracquet() {
	if (x + xa > 0 && x + xa < tennis.getWidth()- WIDTH)
		x = x + xa;
        if (y+ya < tennis.getHeight()-HEIGHT) {
            y = y +ya;
        }
    }
    public void paint(Graphics2D g) {
        g.fillRect(x, y, WIDTH, HEIGHT);
    }
    public void keyReleased(KeyEvent e) {
	xa = 0;
    }

    public void keyPressed(KeyEvent e) {
	if (e.getKeyCode() == KeyEvent.VK_LEFT)
		xa = -2*tennis.speed;
	if (e.getKeyCode() == KeyEvent.VK_RIGHT)
		xa = 2*tennis.speed;
        if (e.getKeyCode() == KeyEvent.VK_UP) {
            ya= -2*tennis.speed;
        }
        if (e.getKeyCode() == KeyEvent.VK_DOWN) {
            ya = 2*tennis.speed;
        }
    }
    public Rectangle getBounds(){
        return new Rectangle(x, y, WIDTH, HEIGHT);
    }
    public int getTopY(){
        return y - HEIGHT;
    }
}
