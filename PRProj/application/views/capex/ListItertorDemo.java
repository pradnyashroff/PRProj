import java.util.*;
class ListItertorDemo{
	public static void main(String[] args){
	LinkedList l = new LinkedList(){
	l.add("Pradnya");
	l.add("Ganesh");
	l.add("Priya");
	l.add("Sachin");
	l.add("Test");
		System.out.println("Printing plain list.........." +l);
	
		ListIterator ltr = l.listIterator();
		
		while(ltr.hasNext()){
			String s = (String) ltr.next();
			
			if(s.equals("Test")){
				ltr.remove();
				System.out.println("data of remove"+s);
				
			}
			else if(s.equals("Ganesh")){
				ltr.add("Test");
				System.out.println("data of add"+s);
			}
			
		}
	
	}
	

	}

}