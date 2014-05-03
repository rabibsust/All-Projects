package minitennis;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.RenderingHints;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;
import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.plaf.FontUIResource;
import javax.swing.text.StyledEditorKit;

@SuppressWarnings("serial")
public class Minitennis extends JPanel{
    Ballsprite ball= new Ballsprite(this);
    Racquet racquet = new Racquet(this);
    SoundTest soundTest = new SoundTest();
    
    int speed = 1;
    
    private int getScore()  {
        return speed - 1;
    }
    
    private void move() {
        ball.moveball();
        racquet.moveracquet();
    }
    
    public Minitennis() {
        addKeyListener(new KeyListener() {

            @Override
            public void keyTyped(KeyEvent e) {
               
            }

            @Override
            public void keyPressed(KeyEvent e) {
               racquet.keyPressed(e);
            }

            @Override
            public void keyReleased(KeyEvent e) {
                racquet.keyReleased(e);
            }
        });
        setFocusable(true);
        soundTest.BACK();
    }
    

    public void gameover()  {
    
        JOptionPane.showMessageDialog(this, "Your Score is: " +getScore(), "Game over!!!", JOptionPane.YES_NO_CANCEL_OPTION);
        System.exit(ABORT);
    }
    
    @Override
    public void paint(Graphics g){
        super.paint(g);
        Graphics2D g2d =(Graphics2D) g;
        g2d.setRenderingHint(RenderingHints.KEY_ANTIALIASING, RenderingHints.VALUE_ANTIALIAS_ON);
        g2d.setBackground(Color.yellow);
        ball.paint(g2d);
        racquet.paint(g2d);
        
        g2d.setFont(new Font(Font.SANS_SERIF,Font.BOLD, 30));
        g2d.drawString(String.valueOf(getScore()), 10, 30);
    }
    public static void main(String[] args) throws InterruptedException{
        JFrame frame = new JFrame("mini tennis");
        Minitennis tennis = new Minitennis();
        frame.add(tennis);
        frame.setSize(300, 500);
        frame.setVisible(true);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        tennis.soundTest.getClass();
        tennis.setBackground(Color.YELLOW);
        while (true) {            
            tennis.move();
      //      tennis.moverec();
            tennis.repaint(); 
            Thread.sleep(10);
        }
    }
}
