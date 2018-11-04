# Generated by Django 2.1 on 2018-08-17 11:48

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0054_auto_20180817_1135'),
    ]

    operations = [
        migrations.CreateModel(
            name='Testimonials',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('title', models.CharField(default='', max_length=100)),
                ('body', models.TextField()),
                ('image', models.ImageField(default='noimage.jpg', upload_to='businessabout')),
            ],
        ),
    ]